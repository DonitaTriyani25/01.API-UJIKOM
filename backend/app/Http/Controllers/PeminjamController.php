<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Peminjaman;
use App\Models\DetailPinjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamController extends Controller
{
    // Melihat daftar alat yang tersedia
    public function katalogAlat()
    {
        $alats = Alat::with('kategori')
            ->where('stok', '>', 0)
            ->get();

        return view('peminjam.katalog', compact('alats'));
    }

    // Mengajukan peminjaman
    public function ajukanPeminjaman(Request $request)
    {
        $request->validate([
            'tgl_kembali_plan' => 'required|date|after:today',
            'alat_id' => 'required|array',
            'jumlah' => 'required|array',
        ]);

        DB::beginTransaction();

        try {
            $peminjaman = Peminjaman::create([
                'user_id' => auth()->id(),
                'tgl_pinjam' => now(),
                'tgl_kembali_plan' => $request->tgl_kembali_plan,
                'status' => 'diajukan',
            ]);

            foreach ($request->alat_id as $index => $alatId) {
                DetailPinjam::create([
                    'peminjaman_id' => $peminjaman->id,
                    'alat_id' => $alatId,
                    'jumlah' => $request->jumlah[$index],
                ]);
            }

            DB::commit();

            return redirect()->route('peminjam.riwayat')
                ->with('success', 'Pengajuan peminjaman berhasil dikirim.');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()
                ->with('error', 'Gagal mengajukan peminjaman: ' . $e->getMessage());
        }
    }

    // Melihat riwayat peminjaman user yang sedang login
    public function riwayatPeminjaman()
    {
        $peminjaman = Peminjaman::with('detailPinjam.alat')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('peminjam.riwayat', compact('peminjaman'));
    }

    // Menghapus riwayat peminjaman
    public function hapusRiwayat($id)
    {
        $peminjaman = Peminjaman::with('detailPinjam.alat')
            ->where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $status = strtolower(trim($peminjaman->status ?? ''));

        // Cek status selesai
        $sudahSelesai = in_array($status, [
            'selesai',
            'dikembalikan'
        ]);

        // Cek apakah barang sudah dihapus admin
        $barangDihapus = $peminjaman->detailPinjam()
            ->whereDoesntHave('alat')
            ->exists();

        // Hanya riwayat selesai atau barang dihapus admin
        // yang boleh dihapus
        if (!$sudahSelesai && !$barangDihapus) {
            return back()->with(
                'error',
                'Riwayat hanya bisa dihapus jika peminjaman sudah selesai atau barang sudah dihapus admin.'
            );
        }

        DB::beginTransaction();

        try {
            // Hapus detail terlebih dahulu
            $peminjaman->detailPinjam()->delete();

            // Hapus riwayat peminjaman
            $peminjaman->delete();

            DB::commit();

            return back()->with(
                'success',
                'Riwayat peminjaman berhasil dihapus.'
            );

        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with(
                'error',
                'Gagal menghapus riwayat peminjaman: ' . $e->getMessage()
            );
        }
    }
}