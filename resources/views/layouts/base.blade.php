<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
<x-partials.head></x-partials.head>
<style>
      .gradient {
        background: linear-gradient(90deg, #d53369 0%, #daae51 100%);
      }
    </style>
    </head>
    <body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">
        <x-partials.nav></x-partials.nav>
        <x-ui.alerts></x-ui.alerts>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

        <footer>
            <x-partials.footer></x-partials.footer>
        </footer>
        <livewire:scripts>
    </body>
</html>
