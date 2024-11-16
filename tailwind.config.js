/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './**\*.{php,html,js}',
    './src/**/*.{php,html,js}',
  ],
  theme: {
    screens: {
      sm: '480px',
      md: '768px',
      lg: '976px',
      xl: '1440px',
    },
    colors: {
      // 100 jest najciemniejszy.
      'primary-100': '#011528',
      'primary-200': '#02203D',
      'primary-300': '#022A4F',
      // LightBlue
      'secondary-100': '#2CBAF2',
      // White textFont
      'secondary-200': '#ECF9FE',
      'alert': '#E94220',
    },
    fontFamily: {
      sans: ['Montserrat', 'sans-serif'],
    },
    extend: {
      spacing: {
        '128': '32rem',
        '144': '36rem',
      },
      borderRadius: {
        '4xl': '2rem',
      }
    }
  },
  plugins: [],
}