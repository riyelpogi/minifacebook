/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      'white': '#ffffff',
      'purple': '#3f3cbb',
      'midnight': '#121063',
      'metal': '#565584',
      'tahiti': '#3ab7bf',
      'silver': '#ecebff',
      'bubble-gum': '#ff77e9',
      'bermuda': '#78dcca',
      'grayish': '#cbd5e1',
      'zinc' : '#f4f4f5',
      'slate' : '#e2e8f0',
      'green' : '#16a34a',
      'bb' : '#3b82f6',
      'cmmntbtn' : '#4f46e5',
      'blue' : '#3b82f6',
      'online' : '#84cc16',
      'gray' : '#94a3b8 ',
      'pink' : '#ec4899',
      'white' : '#f1f5f9',
      'cyan' : '#fb7185',
      'teal' : '#5eead4',
      'emerald' : '#10b981',
      'greenish' : '#00B8A9',
    },
    screens: {
      's' : '400px',
      'sm': '640px',
      'md': '768px',
      'lg': '1024px',
      'xl': '1536px',

    }
 
},
  plugins: [
  ],
}

