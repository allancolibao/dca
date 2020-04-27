const formatter = new Intl.NumberFormat('en-US', {
    minimumFractionDigits: 4,      
    maximumFractionDigits: 4,
 });
 

$("#sec_04_01_01, #sec_04_01_02").keyup(function() {
    let weight1 = Number($('#sec_04_01_01').val(), 10);
    let weight2 = Number($('#sec_04_01_02').val(), 10);
    let totalWeight = (weight1 + weight2) / 2;
    $('#sec_04_01_03').val(!weight1 || !weight2 ? '' : totalWeight);
});

$("#sec_04_02_01, #sec_04_02_02").keyup(function() {
    let height1 = Number($('#sec_04_02_01').val(), 10);
    let height2 = Number($('#sec_04_02_02').val(), 10);
    let totalHeight = (height1 + height2) / 2;
    $('#sec_04_02_03').val(!height1 || !height2 ? '' : totalHeight);
});


$("#calculate").click(function() {
    let weight = Number($('#sec_04_01_03').val(), 10);
    let height = Number($('#sec_04_02_03').val(), 10);
    let bmi = weight / (height * height);
    $('#sec_04_03').val(!weight || !height ? '' : formatter.format(bmi));
    
    if(weight && height){
        if(bmi < 18.5){
            $('#sec_04_03_01').val('Underweight')
        } else if(bmi >= 18.5 && bmi <= 23) {
            $('#sec_04_03_01').val('Normal')
        } else if(bmi > 23 && bmi <= 27.5) {
            $('#sec_04_03_01').val('Overweight')
        } else if(bmi > 27.5) {
            $('#sec_04_03_01').val('Obese')
        } 
    } else {
        $('#sec_04_03_01').val('');
        $('#sec_04_03').val('');
    }
});


$("#sec_02_01_01, #sec_02_02_01").keyup(function() {
    let weight = Number($('#sec_02_01_01').val(), 10);
    let height = Number($('#sec_02_02_01').val(), 10);
    let bmi = weight / ( height  * height );
    $('#sec_02_03_01').val(!weight || !height ? '' : formatter.format(bmi));
});

$("#sec_02_01_02, #sec_02_02_02").keyup(function() {
    let weight = Number($('#sec_02_01_02').val(), 10);
    let height = Number($('#sec_02_02_02').val(), 10);
    let bmi = weight / ( height  * height );
    $('#sec_02_03_02').val(!weight || !height ? '' : formatter.format(bmi));
});

$("#sec_02_01_03, #sec_02_02_03").keyup(function() {
    let weight = Number($('#sec_02_01_03').val(), 10);
    let height = Number($('#sec_02_02_03').val(), 10);
    let bmi = weight / ( height  * height );
    $('#sec_02_03_03').val(!weight || !height ? '' : formatter.format(bmi));
});