<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class PengembalianController extends Controller
{
    /**
     * Menampilkan daftar transaksi pengembalian.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $pengembalian = Pengembalian::with([
            'peminjaman.user',
            'petugas',
            'user'
        ])
            ->when($search, function ($query, $search) {
                $query->whereHas('peminjaman.user', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                })
                    ->orWhereHas('petugas', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    })
                    ->orWhere('status', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10);

        // Statistik
        $totalPengembalian = Pengembalian::count();

        $menungguVerifikasi = Pengembalian::where(
            'status',
            'menunggu'
        )->count();

        $sudahDikembalikan = Pengembalian::where(
            'status',
            'selesai'
        )->count();

        return view('admin.pengembalian.index', compact(
            'pengembalian',
            'totalPengembalian',
            'menungguVerifikasi',
            'sudahDikembalikan'
        ));
    }

    /**
     * Memperbarui status pengembalian.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $pengembalian = Pengembalian::findOrFail($id);

        $pengembalian->update([
            'status' => $request->status,
        ]);

        return redirect()
            ->back()
            ->with(
                'success',
                'Status pengembalian berhasil diperbarui!'
            );
    }

    /**
     * Verifikasi pengembalian alat.
     */
    public function verifikasi(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $pengembalian = Pengembalian::findOrFail($id);

            /*
             * Mengubah status pengembalian menjadi selesai
             * setelah diverifikasi oleh admin.
             */
            $pengembalian->update([
                'status' => 'selesai',
                'petugas_id' => auth()->id(),
            ]);

            /*
             * Mengubah status peminjaman terkait
             * menjadi Dikembalikan.
             */
            if ($pengembalian->peminjaman) {
                $pengembalian->peminjaman->update([
                    'status' => 'Dikembalikan',
                ]);
            }

            DB::commit();

            return redirect()
                ->back()
                ->with(
                    'success',
                    'Pengembalian berhasil diverifikasi!'
                );
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Gagal memverifikasi: ' . $e->getMessage()
                );
        }
    }

    /**
     * Menghapus data pengembalian.
     */
    public function destroy($id)
    {
        $pengembalian = Pengembalian::findOrFail($id);

        $pengembalian->delete();

        return redirect()
            ->back()
            ->with(
                'success',
                'Data pengembalian berhasil dihapus!'
            );
    }
}