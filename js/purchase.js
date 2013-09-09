/*
*  js操作html的select
*/
function jsAddItemToSelect(objSelect, objItemText, objItemValue) {        
         var varItem = new Option(objItemText, objItemValue);      
         objSelect.options.add(varItem);         
} 

function jsSelectIsExitItem(objSelect, objItemValue) {        
    var isExit = false;        
    for (var i = 0; i < objSelect.options.length; i++)
    {        
       if(objSelect.options[i].value == objItemValue) {        
       isExit = true;        
       break;        
      }        
    }        
    return isExit;        
}  

function jsRemoveItemFromSelect(objSelect, objItemValue) {        
    //判断是否存在        
    if (jsSelectIsExitItem(objSelect, objItemValue)) {        
    for (var i = 0; i < objSelect.options.length; i++) {        
    if (objSelect.options[i].value == objItemValue) {        
        objSelect.options.remove(i);        
        break;        
        }        
      }        
    }     
}    
 

