const formatter = new Intl.NumberFormat('en-US', {
    minimumFractionDigits: 4,      
    maximumFractionDigits: 4,
 });
 

$("#sec_04_01_01, #sec_04_01_02").on("input propertychange", function() {
    let weight1 = Number($('#sec_04_01_01').val(), 10);
    let weight2 = Number($('#sec_04_01_02').val(), 10);
    let totalWeight = (weight1 + weight2) / 2;
    $('#sec_04_01_03').val(!weight1 || !weight2 ? '' : totalWeight);

    calculateBmi();
});

$("#sec_04_02_01, #sec_04_02_02").on("input propertychange", function() {
    let height1 = Number($('#sec_04_02_01').val(), 10);
    let height2 = Number($('#sec_04_02_02').val(), 10);
    let totalHeight = (height1 + height2) / 2;
    $('#sec_04_02_03').val(!height1 || !height2 ? '' : totalHeight);

    calculateBmi();
});


function calculateBmi() {
    let weight = Number($('#sec_04_01_03').val(), 10);
    let height = Number($('#sec_04_02_03').val(), 10);
    let bmi = weight / (height * height);
    $('#sec_04_03').val(!weight || !height ? '' : formatter.format(bmi));
    
    if(weight && height){
        if(bmi < 18.5){ 
            $('#sec_04_03_01').val('Underweight')
        } else if(bmi >= 18.5 && bmi <= 24.99) {
            $('#sec_04_03_01').val('Normal')
        } else if(bmi >= 25.0 && bmi <= 29.99) {
            $('#sec_04_03_01').val('Overweight')
        } else if(bmi >= 30.0) {
            $('#sec_04_03_01').val('Obese')
        } 
    } else {
        $('#sec_04_03_01').val('');
        $('#sec_04_03').val('');
    }
};


const bmiInputs = {
    baseline: [ 
        "weight_01", 
        "height_01", 
        "bmi_01", 
        "bmi_rem_01"
    ],
    midline: [ 
        "weight_02", 
        "height_02", 
        "bmi_02", 
        "bmi_rem_02" 
    ],
    endline: [ 
        "weight_03", 
        "height_03", 
        "bmi_03", 
        "bmi_rem_03" 
    ]
} 

const bmiFields = JSON.parse(JSON.stringify(bmiInputs));

$.map(bmiFields, function(value) {

    $(`#${value[0]}, #${value[1]}`).on("input propertychange",function() {
        let weight = Number($(`#${value[0]}`).val(), 10);
        let height = Number($(`#${value[1]}`).val(), 10);
        let bmi = weight / ( height  * height );
        $(`#${value[2]}`).val(!weight || !height ? '' : formatter.format(bmi));
    
        if(weight && height){
            if(bmi < 18.5){
                $(`#${value[3]}`).val('Underweight')
            } else if(bmi >= 18.5 && bmi <= 24.99) {
                $(`#${value[3]}`).val('Normal')
            } else if(bmi >= 25.0 && bmi <= 29.99) {
                $(`#${value[3]}`).val('Overweight')
            } else if(bmi >= 30.0) {
                $(`#${value[3]}`).val('Obese')
            } 
        } else {
            $(`#${value[3]}`).val('');
        }
    });
});



