// INPUT APP LATER
let currentFilesAppLater = null
clickBtn('appLater', 'inputAppLater')
changeInputFILE('inputAppLater', 'File harus berupa .pdf', 'Max 300kb file size', 'APP_LATER')
// END INPUT APP LATER

// INPUT CV
let currentFilesCV = null
clickBtn('uploadCV', 'inputUploadCV')
changeInputFILE('inputUploadCV', 'File harus berupa .pdf', 'Max 300kb file size', 'CV')
// END INPUT CV

async function validateFilePDF(file, errType, errSize) {
    return await new Promise((resolve, reject) => {
        const type = file.type
        const size = file.size
        if (
            type !== 'application/pdf'
        ) {
            reject(errType)
        }else if (size >= 300000) {
            reject(errSize)
        }else{
            resolve('success')
        }
    })
}

function changeInputFILE(
    inputElementId,
    errType,
    errSize,
    actionType
){
    document.getElementById(inputElementId).addEventListener('change', (e) => {
        const file = e?.target?.files
        if (file.length > 0) {
            validateFilePDF(file[0], errType, errSize)
            .then(res=>{
                const fileName = file[0].name
                if(actionType === 'APP_LATER'){
                    currentFilesAppLater = file
                    setFileName(fileName, 'fileNameAppLater')
                }else if(actionType === 'CV'){
                    currentFilesCV = file
                    setFileName(fileName, 'fileNameUploadCV')
                }
            })
            .catch(err=>{
                if(actionType === 'APP_LATER'){
                    if(currentFilesAppLater?.length > 0){
                        document.getElementById(inputElementId).files = currentFilesAppLater
                    }else{
                        document.getElementById(inputElementId).value = ''
                    }
                }else if(actionType === 'CV'){
                    if(currentFilesCV?.length > 0){
                        document.getElementById(inputElementId).files = currentFilesCV
                    }else{
                        document.getElementById(inputElementId).value = ''
                    }
                }
                alert(err)
            })
        }
    })
}

function clickBtn(btnId, inputId){
    document.getElementById(btnId).addEventListener('click', () => {
        document.getElementById(inputId).click()
    })
}

function setFileName(fileName, elementId) {
    document.getElementById(elementId).innerText = fileName
}