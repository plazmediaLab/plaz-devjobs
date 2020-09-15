module.exports = {
  purge: [],
  theme: {
    extend: {
      animation: {
        'spin-slow': 'spin 4s linear infinite',
      },
      boxShadow: {
        blue: '0px 41.7776px 33.4221px rgba(84, 128, 222, 0.0086), 0px 22.3363px 250px rgba(84, 128, 222, 0.106), 0px 12.5216px 10.0172px rgba(84, 128, 222, 0.125), 0px 6.6501px 5.32008px rgba(84, 128, 222, 0.15), 0px 2.76726px 2.21381px rgba(84, 128, 222, 0.21)',
        card_form: '0px 2px 3px -1px rgba(0,0,0,0.19), 0px 4px 10px -1px rgba(0,0,0,0.02)',
        card_white: '0px 20px 20px 5px rgba(0,0,0,0.07), 0px 1px 7px 1px rgba(0,0,0,0.05), 0px 2px 3px -1px rgba(0,0,0,0.05)',
      },
      borderRadius: {
        extra: '1.5rem',
        container: '10px',
        card: '5px',
      },
      fontSize: {
        'mini': '.5rem',
        'xxs': '.65rem',
        'number-h1': '24px',
        'title-page': '18px',
        'title-item': '14px',
        'description': '12px',
        'price': '13px',
        'label': '10px',
      },
      colors: {
        p_blue: {
          100: "#DDE6F8",
          200: "#BBCCF2",
          300: "#98B3EB",
          400: "#7699E5",
          500: "#5480DE",
          600: "#4366B2",
          700: "#324D85",
          800: "#223359",
          900: "#111A2C",
        },
        carbon: {
          100: "#DBDBDC",
          200: "#B6B8B9",
          300: "#929495",
          400: "#6D7172",
          500: "#494D4F",
          600: "#3A3E3F",
          700: "#2C2E2F",
          800: "#1D1F20",
          900: "#0F0F10",
        },
        'purple_grad': {
          50: '#FBF5FE',
          100: '#F7EAFE',
          200: '#EBCCFC',
          300: '#DFADF9',
          400: '#C76FF5',
          500: '#AF31F1',
          600: '#9E2CD9',
          700: '#691D91',
          800: '#4F166C',
          900: '#350F48',
        },
        'orange_grad': {
          50: '#FEF4F5',
          100: '#FDE9EB',
          200: '#FBC8CE',
          300: '#F8A7B0',
          400: '#F36575',
          500: '#EE233A',
          600: '#D62034',
          700: '#8F1523',
          800: '#6B101A',
          900: '#470B11',
        },
        background: "#ECF0F3",
        reddit: "#ff4500",
      },
    },
    // height: {
    //   banner: '20rem',
    // }
  },
  variants: {},
  plugins: [],
}
