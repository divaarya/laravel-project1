<x-layout >
    <x-slot:judul>{{ $title }}</x-slot:judul>
    <h1 class="text-2xl font-bold">Profil Saya</h1>
    <p class="mt-2">Nama   : {{ $nama }}</p>
    <p>Kelas  : {{ $kelas }}</p>
    <p>Sekolah: {{ $sekolah }}</p>
</x-layout>
