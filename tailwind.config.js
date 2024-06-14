/** @type {import('tailwindcss').Config} */
import preset from './vendor/filament/support/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './resources/**/*.blade.php',
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                'blue-gray-50/50': '#eceff180',
                'webfs-gray': '#f7f7f7',
            }
        },
    },
}
