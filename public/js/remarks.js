// Auto remarks on clinical result with low, normal, high
const fieldsLowNormalHigh = [

    ["wbc_si_01", "wbc_01_rem", 4.22, 9.08, 3.97, 10.05],
    ["wbc_si_02", "wbc_02_rem", 4.22, 9.08, 3.97, 10.05],
    ["wbc_si_03", "wbc_03_rem", 4.22, 9.08, 3.97, 10.05], 
     
    ["rbc_si_01", "rbc_01_rem", 4.62, 6.09, 3.92, 5.23], 
    ["rbc_si_02", "rbc_02_rem", 4.62, 6.09, 3.92, 5.23],
    ["rbc_si_03", "rbc_03_rem", 4.62, 6.09, 3.92, 5.23], 

    ["hemo_si_01", "hemo_01_rem", 136.99, 175.01, 111.00, 157.01], 
    ["hemo_si_02", "hemo_02_rem", 136.99, 175.01, 111.00, 157.01],
    ["hemo_si_03", "hemo_03_rem", 136.99, 175.01, 111.00, 157.01], 

    ["hema_si_01", "hema_01_rem", 0.39, 0.52, 0.33, 0.46], 
    ["hema_si_02", "hema_02_rem", 0.39, 0.52, 0.33, 0.46],
    ["hema_si_03", "hema_03_rem", 0.39, 0.52, 0.33, 0.46], 

    ["mcv_si_01", "mcv_01_rem", 78.99, 92.21, 79.39, 94.81], 
    ["mcv_si_02", "mcv_02_rem", 78.99, 92.21, 79.39, 94.81],
    ["mcv_si_03", "mcv_03_rem", 78.99, 92.21, 79.39, 94.81], 

    ["mch_si_01", "mch_01_rem", 25.69, 32.21, 25.59, 32.21], 
    ["mch_si_02", "mch_02_rem", 25.69, 32.21, 25.59, 32.21],
    ["mch_si_03", "mch_03_rem", 25.69, 32.21, 25.59, 32.21], 

    ["mchc_si_01", "mchc_01_rem", 32.29, 36.51, 32.19, 35.51], 
    ["mchc_si_02", "mchc_02_rem", 32.29, 36.51, 32.19, 35.51],
    ["mchc_si_03", "mchc_03_rem", 32.29, 36.51, 32.19, 35.51], 

    ["rdw_si_01", "rdw_01_rem", 11.59, 14.61, 11.59, 14.61], 
    ["rdw_si_02", "rdw_02_rem", 11.59, 14.61, 11.59, 14.61],
    ["rdw_si_03", "rdw_03_rem", 11.59, 14.61, 11.59, 14.61],
    
    ["pc_si_01", "pc_01_rem", 149.99, 450.01, 149.99, 450.01], 
    ["pc_si_02", "pc_02_rem", 149.99, 450.01, 149.99, 450.01],
    ["pc_si_03", "pc_03_rem", 149.99, 450.01, 149.99, 450.01],

    ["mpv_si_01", "mpv_01_rem", 6.49, 12.01, 6.49, 12.01], 
    ["mpv_si_02", "mpv_02_rem", 6.49, 12.01, 6.49, 12.01],
    ["mpv_si_03", "mpv_03_rem", 6.49, 12.01, 6.49, 12.01],

    ["neu_si_01", "neu_01_rem", 33.99, 68.01, 33.99, 71.01], 
    ["neu_si_02", "neu_02_rem", 33.99, 68.01, 33.99, 71.01],
    ["neu_si_03", "neu_03_rem", 33.99, 68.01, 33.99, 71.01],

    ["lymph_si_01", "lymph_01_rem", 21.99, 53.01, 18.99, 52.01], 
    ["lymph_si_02", "lymph_02_rem", 21.99, 53.01, 18.99, 52.01],
    ["lymph_si_03", "lymph_03_rem", 21.99, 53.01, 18.99, 52.01],

    ["mono_si_01", "mono_01_rem", 4.99, 12.01, 4.99, 12.01], 
    ["mono_si_02", "mono_02_rem", 4.99, 12.01, 4.99, 12.01],
    ["mono_si_03", "mono_03_rem", 4.99, 12.01, 4.99, 12.01],

    ["eos_si_01", "eos_01_rem", 0.99, 7.01, 0.99, 7.01], 
    ["eos_si_02", "eos_02_rem", 0.99, 7.01, 0.99, 7.01],
    ["eos_si_03", "eos_03_rem", 0.99, 7.01, 0.99, 7.01],
    
    ["baso_si_01", "baso_01_rem", 0.00, 1.01, 0.00, 1.01], 
    ["baso_si_02", "baso_02_rem", 0.00, 1.01, 0.00, 1.01],
    ["baso_si_03", "baso_03_rem", 0.00, 1.01, 0.00, 1.01],

    ["ldl_si_01", "ldl_01_rem", 1.26, 4.48, 1.63, 4.35], 
    ["ldl_si_02", "ldl_02_rem", 1.26, 4.48, 1.63, 4.35],
    ["ldl_si_03", "ldl_03_rem", 1.26, 4.48, 1.63, 4.35],

    ["sgpt_si_01", "sgpt_01_rem", 9.99, 50.1, 9.99, 35.01], 
    ["sgpt_si_02", "sgpt_02_rem", 9.99, 50.1, 9.99, 35.01],
    ["sgpt_si_03", "sgpt_03_rem", 9.99, 50.1, 9.99, 35.01],

    ["sgot_si_01", "sgot_01_rem", 9.99, 50.1, 9.99, 35.01], 
    ["sgot_si_02", "sgot_02_rem", 9.99, 50.1, 9.99, 35.01],
    ["sgot_si_03", "sgot_03_rem", 9.99, 50.1, 9.99, 35.01],
];

// Auto remarks on clinical result with Normal, high
const fieldsNormalHigh = [

    ["vldl_si_01", "vldl_01_rem", 0.78, 0.78],
    ["vldl_si_02", "vldl_02_rem", 0.78, 0.78],
    ["vldl_si_03", "vldl_03_rem", 0.78, 0.78], 
     
    ["cholhdl_si_01", "cholhdl_01_rem", 5.70, 4.52], 
    ["cholhdl_si_02", "cholhdl_02_rem", 5.70, 4.52],
    ["cholhdl_si_03", "cholhdl_03_rem", 5.70, 4.52],
    
];

// Auto remarks on clinical result with Positive, negative
const fieldsNegativePositive = [

    ["crp_01", "crp_01_rem", 5.00], 
    ["crp_02", "crp_02_rem", 5.00],
    ["crp_03", "crp_03_rem", 5.00], 
    
];


const inputFieldsLowNormalHigh = JSON.parse(JSON.stringify(fieldsLowNormalHigh));
const inputFieldsNormalHigh = JSON.parse(JSON.stringify(fieldsNormalHigh));
const inputFieldsNegativePositive = JSON.parse(JSON.stringify(fieldsNegativePositive));


// For auto remarks with low, normal, high
$.each(inputFieldsLowNormalHigh, (key , value) => {

    $(`#${value[0]}`).on("input propertychange",function() {
        
        let val = $(this).val(); 
    
        if(sex == 1) {

            if(val){

                if( val <= value[2]) {
                    $(`#${value[1]}`).val('Low')
                } else if( val > value[2] && val < value[3] ) {
                    $(`#${value[1]}`).val('Normal')
                } else if(val >=  value[3]) {
                    $(`#${value[1]}`).val('High')
                }

            } else {
                $(`#${value[1]}`).val('');
            }

        } else {

            if(val){

                if( val <= value[4]) {
                    $(`#${value[1]}`).val('Low')
                } else if( val > value[4] && val < value[5] ) {
                    $(`#${value[1]}`).val('Normal')
                } else if(val >=  value[5]) {
                    $(`#${value[1]}`).val('High')
                }

            } else {
                $(`#${value[1]}`).val('');
            }

        }
        
    });
});


// For auto remarks with normal, high
$.each(inputFieldsNormalHigh, (key , value) => {

    $(`#${value[0]}`).on("input propertychange",function() {
        
        let val = $(this).val(); 
    
        if(sex == 1) {

            if(val){

                if( val <= value[2] ) {
                    $(`#${value[1]}`).val('Normal')
                } else {
                    $(`#${value[1]}`).val('High')
                }

            } else {
                $(`#${value[1]}`).val('');
            }

        } else {

            if(val){

                if( val <= value[3] ) {
                    $(`#${value[1]}`).val('Normal')
                } else {
                    $(`#${value[1]}`).val('High')
                }

            } else {
                $(`#${value[1]}`).val('');
            }

        }
        
    });
});

// For auto remarks with normal, high
$.each(inputFieldsNegativePositive, (key , value) => {

    $(`#${value[0]}`).on("input propertychange",function() {
        
        let val = $(this).val(); 
    
        if(sex == 1) {

            if(val){

                if( val <= value[2] ) {
                    $(`#${value[1]}`).val('Negative')
                } else {
                    $(`#${value[1]}`).val('Positive')
                }

            } else {
                $(`#${value[1]}`).val('');
            }

        } else {

            if(val){

                if( val <= value[2] ) {
                    $(`#${value[1]}`).val('Negative')
                } else {
                    $(`#${value[1]}`).val('Positive')
                }

            } else {
                $(`#${value[1]}`).val('');
            }

        }
        
    });
});


// Blood pressure auto remarks on screening form
$(`#sec_06_01_sys, #sec_06_01_dias`).on("input propertychange",function() {
        
    let systolic = $('#sec_06_01_sys').val(); 
    let diastolic = $('#sec_06_01_dias').val(); 

    if(systolic != "" && diastolic != "") {

        if(systolic < 120 && diastolic < 80) {
            $('#sec_06_02').val("Normal");
        } else if((systolic >= 120 && systolic <= 139) || (diastolic >=80 && diastolic <=89)) {
            $('#sec_06_02').val("Prehypertension");
        } else if((systolic >= 140 && systolic <= 159) || (diastolic >=90 && diastolic <=99)) {
            $('#sec_06_02').val("Hypertension, Stage 1");
        } else if(systolic >= 160 || diastolic >= 100) {
            $('#sec_06_02').val("Hypertension, Stage 2");
        }
    } else {
        $('#sec_06_02').val("");
    } 
    
});


const resultNumber = ["01","02","03"];


$.each(resultNumber, (key , value) => {

    // fbs
    $(`#fbs_si_${value}`).on("input propertychange",function() {
    
        let val = $(this).val(); 

        if(val){

            if(val >= 3.89 && val <= 5.49) {
                $(`#fbs_${value}_rem`).val('Normal')
            } else if( val >= 5.55 && val <= 6.94 ) {
                $(`#fbs_${value}_rem`).val('Pre-Diabetics')
            } else if(val >=  7.00) {
                $(`#fbs_${value}_rem`).val('Diabetics')
            }

        } else {
            $(`#fbs_${value}_rem`).val('');
        }

    });

    // cholesterol
    $(`#choles_si_${value}`).on("input propertychange",function() {
        
        let val = $(this).val(); 

        if(val){

            if(val < 5.20) {
                $(`#choles_${value}_rem`).val('Desirable')
            } else if( val >= 5.20 && val < 6.20 ) {
                $(`#choles_${value}_rem`).val('Borderline High')
            } else if(val >=  6.20) {
                $(`#choles_${value}_rem`).val('High')
            }

        } else {
            $(`#choles_${value}_rem`).val('');
        }

    });

    // triglycerides
    $(`#trig_si_${value}`).on("input propertychange",function() {
        
        let val = $(this).val(); 

        if(val){

            if(val < 1.69) {
                $(`#trig_${value}_rem`).val('Desirable')
            } else if( val >= 1.69 && val <= 2.25 ) {
                $(`#trig_${value}_rem`).val('Borderline High')
            } else if(val >  2.25 && val < 5.65) {
                $(`#trig_${value}_rem`).val('High')
            } else if(val >=  5.65) {
                $(`#trig_${value}_rem`).val('Very High')
            }

        } else {
            $(`#trig_${value}_rem`).val('');
        }

    });

    // HDL
    $(`#hdl_conv_${value}`).on("input propertychange",function() {
        
        let val = $(this).val(); 

        if(val){

            if(val < 40) {
                $(`#hdl_${value}_rem`).val('Low')
            } else if( val >= 40 && val <= 59 ) {
                $(`#hdl_${value}_rem`).val('Borderline High')
            } else if(val >= 60 ) {
                $(`#hdl_${value}_rem`).val('Desirable')
            }

        } else {
            $(`#hdl_${value}_rem`).val('');
        }

    });
});


