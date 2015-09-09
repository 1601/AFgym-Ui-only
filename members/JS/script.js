$(document).ready(function(){

	$('.combo').combobox();	
	
	$('input').keyup(function(){
		$(this).css('background-color', '#FFF');
	});
	
	$('textarea').keyup(function(){
		$(this).css('background-color', '#FFF');
	});
	
	$('select').change(function(){
		$(this).css('background-color', '#FFF');
	});
	
});

function resize(){
	$("#osx-container").css('height', 'auto'); //To reset the container.
	$(window).trigger('resize.simplemodal');
}

function width_resize(a){
	a = typeof a !== 'undefined' ? a : 700;
	$("#osx-container").css('width', a); //To reset the container.
	$(window).trigger('resize.simplemodal');
}

function number_format(num, decimal, decimalSep, milharSep){
    decimalSep = decimalSep ? decimalSep : '.';
    milharSep = milharSep ? milharSep : ',';
    
    var intval = parseInt(num);
    if(String(num).indexOf('.')!==-1){
        var decval = String(num).split('.');
        decval = decval[1];
    }
    
    intval = String(intval).split('');
    intval = intval.reverse();
    var c=1;
    var aux='';
    for(var i=0; i<intval.length; i++){
        aux+= intval[i];
        if(c==3 && i!=intval.length-1){
            aux+=milharSep;
            c = 1;
        }else
            c++;
    }
    aux = aux.split("").reverse().join("");
    intval = aux;
    if(decval){
        decval = String(decval).substring(0, decimal);
    }else
        decval = '';
    while(decval.length<decimal){
        decval+='0';  
    }
    num = String(intval)+decimalSep+decval;
    return num;
}