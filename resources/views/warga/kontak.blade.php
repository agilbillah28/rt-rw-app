@extends('layouts.user')

@section('title', 'Kontak Kami')

@section('content')
<div class="min-h-[60vh] flex items-center justify-center">
    <div class="bg-white shadow rounded-xl p-8 max-w-lg w-full text-center space-y-6">
        {{-- Logo WhatsApp Minimalis --}}
        <div class="flex justify-center">
            <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/WhatsApp_icon.png" 
                 alt="WhatsApp" class="h-16 w-16 rounded-full shadow-md">
        </div>

        {{-- Judul & Deskripsi --}}
        <h1 class="text-2xl font-bold text-gray-800">Hubungi Kami</h1>
        <p class="text-gray-600 text-sm">
            Jika ada pertanyaan atau ingin menyampaikan sesuatu, silakan hubungi admin melalui WhatsApp.
            Klik tombol di bawah untuk langsung mengirim pesan.
        </p>

        {{-- Tombol WhatsApp --}}
        <a href="https://wa.me/6283894158103" target="_blank"
           class="inline-flex items-center justify-center gap-2 bg-green-500 hover:bg-green-600 text-white text-base font-medium px-6 py-3 rounded-lg shadow transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20.52 3.48A11.77 11.77 0 0 0 12 0C5.4 0 0 5.4 0 12a11.7 11.7 0 0 0 1.7 6.1L0 24l6-1.6A11.9 11.9 0 0 0 12 24c6.6 0 12-5.4 12-12a11.7 11.7 0 0 0-3.48-8.52ZM12 22.5a9.7 9.7 0 0 1-7.4-3.1l-.3-.2-3.5.9.9-3.4-.2-.3A9.7 9.7 0 1 1 12 22.5Zm5.5-7.3c-.3-.1-1.8-.9-2.1-1.1-.3-.1-.5-.2-.7.2s-.8 1.1-1 1.3-.3.2-.6.1a8.1 8.1 0 0 1-2.3-1.4 8.5 8.5 0 0 1-1.6-2c-.1-.3 0-.5.1-.6s.2-.3.3-.5.1-.4 0-.6c-.1-.2-.6-1.4-.8-1.9s-.4-.4-.6-.4h-.5c-.2 0-.6.1-.9.4s-1.2 1.2-1.2 3c0 1.7 1.3 3.3 1.5 3.5.2.3 2.5 3.9 6.2 5.3a14 14 0 0 0 1.5.4 3.6 3.6 0 0 0 1.6.1 4 4 0 0 0 2.6-1.8 3.5 3.5 0 0 0 .3-1.8c-.1-.2-.4-.3-.7-.4Z" />
            </svg>
            Chat WhatsApp
        </a>
    </div>
</div>
@endsection
