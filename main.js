const {app, BrowserWindow } = require('electron')
const { setMainMenu } = require('./js/menu.js')
const path = require('path')

const createWindow = () => {
    const mainWindow = new BrowserWindow({
        width: 1200,
        height: 700,
        minWidth: 800,
        minHeight: 600,
        webPreferences: {
            preload: path.join(__dirname + '/preload.js')
        }
    })

    mainWindow.loadFile('index.html')
    setMainMenu(mainWindow)
}


app.whenReady().then(() => {
    createWindow()
})