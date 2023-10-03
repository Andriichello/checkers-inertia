/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/**/*.{js,ts,jsx,tsx,vue,blade.php}',
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require("daisyui"),
  ],
  daisyui: {
    styled: true,
    themes: ['light', 'dark'],
    darkTheme: 'dark',
  },
}

