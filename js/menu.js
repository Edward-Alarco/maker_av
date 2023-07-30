const {app, Menu } = require('electron')

const isMac = process.platform === 'darwin',
    isWindows = process.platform === 'win32',
    isLinux = process.platform === 'linux';

const setMainMenu = (mainWindow) => {
    const template = [
        {
            label: 'File',
            submenu: [
                { 
                    label: 'Create',
                    click: () => {

                    }
                },
                {type: 'separator'},
                {role: 'quit'}
            ]
        },
        {
            label: 'Themes',
            submenu: [
                {
                    label: 'Light',
                    click: () => {
                        mainWindow.webContents.send('update-theme', 'light')
                    }
                },
                {
                    label: 'Dark',
                    click: () => {
                        mainWindow.webContents.send('update-theme', 'dark')
                    }
                },
            ]
        },
        {
            label: 'View',
            submenu: [
                {role: 'reload'},
                {role: 'forceReload'},
                {role: 'toggleDevTools'},
                {type: 'separator'},
                {role: 'resetZoom'},
                {role: 'zoomIn'},
                {role: 'zoomOut'},
                {type: 'separator'},
                {role: 'togglefullscreen'}
            ]
        },
    ]

    const menu = Menu.buildFromTemplate(template)
    Menu.setApplicationMenu(menu)
}

module.exports = {
    setMainMenu
}