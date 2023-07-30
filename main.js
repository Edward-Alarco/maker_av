const {app, BrowserWindow, ipcMain, ipcRenderer } = require('electron')
const { setMainMenu } = require('./js/menu.js')
const path = require('path')

let mainWindow;

const createWindow = () => {
    mainWindow = new BrowserWindow({
        width: 1200,
        height: 700,
        minWidth: 800,
        minHeight: 600,
        webPreferences: {
            nodeIntegration: true,
            preload: path.join(__dirname + '/preload.js')
        }
    })

    mainWindow.loadFile('index.html')
    setMainMenu(mainWindow)

    mainWindow.on('closed', () => {
        mainWindow = null;
    });
}

app.on('ready', createWindow);

app.on('window-all-closed', () => {
    if (process.platform !== 'darwin') {
        app.quit();
    }
});

app.on('activate', () => {
    if (mainWindow === null) {
        createWindow();
    }
});