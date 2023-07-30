const $ = selector => document.querySelector(selector)

window.electronAPI.onUpdateTheme((event, theme) => {
    const root = document.documentElement
    console.log({theme})
    root.style.setProperty('--scheme', theme)
})