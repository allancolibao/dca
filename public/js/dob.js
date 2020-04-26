
function roundNumber(rnum, rlength) {
    let newNumber = Math.round(rnum*Math.pow(10,rlength))/Math.pow(10,rlength);
    return newNumber; 
}

$("#birth_date").change(function() {
    let dob = $(this).val();
    dob = new Date(dob);
    let today = new Date();
    let one_year=1000*60*60*24* 30.4375*12   
    let age = roundNumber((today-dob) / one_year, 4);
    $('#age').val(age);
});
