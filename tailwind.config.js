const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  theme: {
    extend: {
      screens: {
        '2xl': '1536px'
      },
      colors: {
        'qualify-red': {
          'default': '#dd163d',
          '900': '#B1063B',
          '600': '#CF1D3F',
          '500': '#dd163d',
          '400': '#e5506d',
          '300': '#ee8a9d',
          '200': '#f7c4ce',
          '100': '#fce7eb',
        },
        'ts-front': {
          'bg': '#f5f5f5',
          'label': '#43525A',
          'label-error': '#dd163d',
          'field-light': '#fafbfc',
          'field-dark': '#ecedee',
          'border-light': '#e6ebee',
          'border-dark': '#a2b7c0',
          'border-error': '#dd163d',
          'table-header': '#f9fafa',
          'empty-state-header': '#404244',
          'hr': '#707070',
        },
        'ts-gray': {
          'header': '#f9fafa',
          'text': '#727D83',
          'text-bold': '#43525A',
          'quiz': '#CFD8DD',
          'quiz-question-number': '#D0D3D5',
          'quiz-progress-bar': '#CED8DD',
          '100': '#fafbfc',
          '200': '#f5f5f5',
          '300': '#e6ebee',
          '400': '#a2b7c0',
          '500': '#eaebeb',
          '700': '#68686a',
        },

        'ts-blue': {
          '50': '#D0DBE0',
          '100': '#edf3f6',
          '200': '#eaf1f4',
          '400': '#86A8B6',
          '500': '#145f84',
          '600': '#467082',
        },
        'ts-red': {
          '100': '#f7e5eb',
          '200': '#f9e9ea',
          '500': '#c0242e',
          '600': '#ae1b34',
          '900': '#B1063B',
        },
        'ts-green': {
          '200': '#e7f2ef',
          '300': '#cbf4c9',
          '500': '#148466',
          '700': '#0e6245',
        },
        'ts-orange': {
          '100': '#FDF3F2',
          '200': '#fdf3ea',
          '500': '#d97b26',
          '900': '#E55C4F',
          '600': '#E55C4F',
          '900': '#E55C4F',
        },
        'darkGray': {
          'default': '#43525A',
          '1000': '#404244',
          '900': '#43525A',
          '800': '#696A6C',
          '700': '#727D83',
          '500': '#A0A8AC',
          '400': '#A3B7C0',
          '300': '#D0D3D5',
          '100': '#ECEDEE',
        },
      },
      width: {
        min: '1%',
        '18': '4.5rem',
        '120': '30rem',
        '260px': '260px',
      },
      height: {
        '18': '4.5rem',
        '28': '7rem',
        '96': '24rem',
        '160': '40rem',
      },
      maxHeight: {
        xxs: '10rem',
      },
      margin: {
        '0.5': '0.125rem',
      },
      fontFamily: {
        sans: ['Open Sans', ...defaultTheme.fontFamily.sans],
        heading: ['Nunito Sans', ...defaultTheme.fontFamily.sans],
        nexa: ['Nexa Book', 'Open Sans', ...defaultTheme.fontFamily.sans],
      },
      spacing: {
        '2px': '2px',
      },
      inset: {
        '-0.5': '-0.5rem',
      },
      maxWidth: {
        '15': '15rem',
        '10': '10rem',
      },
      padding: {
        '18': '4.5rem'
      },
      opacity: {
        '8': '0.08',
        '16': '0.16',
        '30': '.3',
        '65': '0.65',
      },
      backgroundOpacity: {
        '8': '0.08',
        '16': '0.16',
      },
    },
    fill: (theme) => ({
      current: 'currentColor',
      ...theme('colors'),
    }),
    stroke: (theme) => ({
      current: 'currentColor',
      ...theme('colors'),
    }),
    maxWidth: {
      px: '1px',
      xs: '20rem',
      sm: '30rem',
      md: '40rem',
      lg: '50rem',
      xl: '60rem',
      '2xl': '70rem',
      '3xl': '80rem',
      '4xl': '90rem',
      '5xl': '100rem',
      full: '100%',
    },
  },
  variants: ['responsive', 'group-hover', 'focus-within', 'hover', 'focus', 'active', 'odd', 'first', 'last'],
  mode: 'jit',
  layers: ['base', 'components', 'utilities'],
  content: ['./resources/**/*.js', './resources/**/*.php', './resources/**/*.vue'],
  options: {
    whitelistPatterns: [/nprogress/],
  },
}
