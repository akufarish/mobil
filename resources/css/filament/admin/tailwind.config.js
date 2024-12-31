import preset from '../../../../vendor/filament/filament/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                primary: "#fe3535",
                danger: "#FCDECE",
                secondary: "#D36341",
                lightmode: "#fff1f1",
                custom_red_100: "#dc240a",
                custom_red_400: "#ff6565",
                custom_red_200: "#f33d16",
                custom_red_950: "#dc240a",
            }
        }
    }
}
