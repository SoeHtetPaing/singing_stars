// user
//function to handle login-form validation
function loginValidate(loginForm){

    var validationVerified=true;
    var errorMessage="";
    var okayMessage="click OK to continue";
    
    if (loginForm.myusername.value=="")
    {
        errorMessage+="Email not filled!\n";
        validationVerified=false;
    }
    if(loginForm.mypassword.value=="")
    {
        errorMessage+="Password not filled!\n";
        validationVerified=false;
    }
    if (!isValidEmail(loginForm.myusername.value)) {
        errorMessage+="Invalid email address provided!\n";
        validationVerified=false;
    }
    if(!validationVerified)
    {
        alert(errorMessage);
    }
    if(validationVerified)
    {
        alert(okayMessage);
    }
        return validationVerified;
    }
    
    //function to handle register-form validation
    function registerValidate(registerForm){
    
        var validationVerified=true;
        var errorMessage="";
        var okayMessage="click OK to process registration";
    
        if (registerForm.firstname.value=="")
        {
            errorMessage+="Firstname not filled!\n";
            validationVerified=false;
        }
        if(registerForm.lastname.value=="")
        {
            errorMessage+="Lastname not filled!\n";
            validationVerified=false;
        }
        if (registerForm.email.value=="")
        {
            errorMessage+="Email not filled!\n";
            validationVerified=false;
        }
        if (registerForm.voter_id.value=="")
        {
            errorMessage+="Voter Id not filled!\n";
            validationVerified=false;
        }
        if(registerForm.password.value=="")
        {
            errorMessage+="Password not provided!\n";
            validationVerified=false;
        }
        if(registerForm.ConfirmPassword.value=="")
        {
            errorMessage+="Confirm password not filled!\n";
            validationVerified=false;
        }
        if(registerForm.ConfirmPassword.value!=registerForm.password.value)
        {
            errorMessage+="Confirm password and password do not match!\n";
            validationVerified=false;
        }
        if (!isValidEmail(registerForm.email.value)) {
            errorMessage+="Invalid email address provided!\n";
            validationVerified=false;
        }
        if (!isValidVoterId(registerForm.voter_id.value)) {
            errorMessage+="Invalid Voter Id provided!\n";
            validationVerified=false;
        }
        if(!validationVerified)
        {
            alert(errorMessage);
        }
        if(validationVerified)
        {
            alert(okayMessage);
        }
        return validationVerified;
    }
    
    //function to handle update-form validation
    function updateProfile(registerForm){
    
        var validationVerified=true;
        var errorMessage="";
        var okayMessage="click OK to update your account";
    
        if (registerForm.firstname.value=="")
        {
        errorMessage+="Firstname not filled!\n";
        validationVerified=false;
        }
        if(registerForm.lastname.value=="")
        {
        errorMessage+="Lastname not filled!\n";
        validationVerified=false;
        }
        if (registerForm.email.value=="")
        {
        errorMessage+="Email not filled!\n";
        validationVerified=false;
        }
        if (registerForm.voter_id.value=="")
        {
        errorMessage+="Voter ID not filled!\n";
        validationVerified=false;
        }
        if(registerForm.password.value=="")
        {
        errorMessage+="New password not provided!\n";
        validationVerified=false;
        }
        if(registerForm.ConfirmPassword.value=="")
        {
        errorMessage+="Confirm password not filled!\n";
        validationVerified=false;
        }
        if(registerForm.ConfirmPassword.value!=registerForm.password.value)
        {
        errorMessage+="Confirm password and new password do not match!\n";
        validationVerified=false;
        }
        if (!isValidEmail(registerForm.email.value)) {
        errorMessage+="Invalid email address provided!\n";
        validationVerified=false;
        }
        if(!validationVerified)
        {
        alert(errorMessage);
        }
        if(validationVerified)
        {
        alert(okayMessage);
        }
        return validationVerified;
    }
    
    //validate email function
    function isValidEmail(val) {
        var re = /^[\w\+\'\.-]+@[\w\'\.-]+\.[a-zA-Z]{2,}$/;
        if (!re.test(val)) {
            return false;
        }
        return true;
    }
    //validate voter id
    function isValidVoterId(val){
        // var length = 17;
        // if (!re.test(val)) {
        //     return false;
        // }
        // return true;
    
        var len = val.toString().length;
        if(len === 17){
            return true;
        }
        return false;
    }
    
    //validate special PIN
    function isValidSpecialPIN(val) {
        var re = /^[0-9][0-9][A-Z][A-Z][A-Z][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/;
        if (!re.test(val)) {
            return false;
        }
        return true;
    }
    
    //validate special PIN length
    function isValidLength(val){
        var length = 12;
        if (!re.test(val)) {
            return false;
        }
        return true;
    }
    
    // onchange of qty field entry totals the price
    function getProductTotal(field) {
        clearErrorInfo();
        var form = field.form;
        if (field.value == "") field.value = 0;
        if ( !isPosInt(field.value) ) {
            var msg = 'Please enter a positive integer for quantity.';
            addValidationMessage(msg);
            addValidationField(field)
            displayErrorInfo( form );
            return;
        } else {
            var product = field.name.slice(0, field.name.lastIndexOf("_") ); 
            var price = form.elements[product + "_price"].value;
            var amt = field.value * price;
            form.elements[product + "_tot"].value = formatDecimal(amt);
            doTotals(form);
        }
    }
    
    function doTotals(form) {
        var total = 0;
        for (var i=0; PRODUCT_ABBRS[i]; i++) {
            var cur_field = form.elements[ PRODUCT_ABBRS[i] + "_qty" ]; 
            if ( !isPosInt(cur_field.value) ) {
                var msg = 'Please enter a positive integer for quantity.';
                addValidationMessage(msg);
                addValidationField(cur_field)
                displayErrorInfo( form );
                return;
            }
            total += parseFloat(cur_field.value) * parseFloat( form.elements[ PRODUCT_ABBRS[i] + "_price" ].value );
        }
        form.elements['total'].value = formatDecimal(total);
    }
    
    //validate orderform
    function finalCheck(orderForm) {
        var validationVerified=true;
    var errorMessage="";
    var okayMessage="click OK to process your order";
    
    if (orderForm.quantity.value=="")
    {
    errorMessage+="Please provide a quantity.\n";
    validationVerified=false;
    }
    if (orderForm.quantity.value==0)
    {
    errorMessage+="Please provide a quantity rather than 0.\n";
    validationVerified=false;
    }
    if(orderForm.total.value=="")
    {
    errorMessage+="Total has not been calculated! Please provide first the quantity.\n";
    validationVerified=false;
    }
    if(!validationVerified)
    {
    alert(errorMessage);
    }
    if(validationVerified)
    {
    alert(okayMessage);
    }
    return validationVerified;
    }
    
    //validate updateForm
    function updateValidate(updateForm) {
        var validationVerified=true;
    var errorMessage="";
    var okayMessage="click OK to change your password";
    
    if (updateForm.opassword.value=="")
    {
    errorMessage+="Please provide your old password.\n";
    validationVerified=false;
    }
    if (updateForm.npassword.value=="")
    {
    errorMessage+="Please provide a new password.\n";
    validationVerified=false;
    }
    if(updateForm.cpassword.value=="")
    {
    errorMessage+="Please confirm your new password.\n";
    validationVerified=false;
    }
    if(updateForm.cpassword.value!=updateForm.npassword.value)
    {
    errorMessage+="Confirm password and new password do not match!\n";
    validationVerified=false;
    }
    if(!validationVerified)
    {
    alert(errorMessage);
    }
    if(validationVerified)
    {
    alert(okayMessage);
    }
    return validationVerified;
    }
    
    
    //validate reserve form
    function reserveValidate(reserveForm){
    
    var validationVerified=true;
    var errorMessage="";
    var okayMessage="click OK to reserve this table";
    
    if (reserveForm.tNumber.selectedIndex==0)
    {
    errorMessage+="Please select a table by its number!\n";
    validationVerified=false;
    }
    if(!validationVerified)
    {
    alert(errorMessage);
    }
    if(validationVerified)
    {
    alert(okayMessage);
    }
    return validationVerified;
    }
    
    //validate position form
    function positionValidate(positionForm){
    
    var validationVerified=true;
    var errorMessage="";
    var okayMessage="click OK to see the candidates under the chosen position";
    
    if (positionForm.position.selectedIndex == 0)
    {
    errorMessage+="Position not set!\n";
    validationVerified=false;
    }
    if(!validationVerified)
    {
    alert(errorMessage);
    }
    if(validationVerified)
    {
    alert(okayMessage);
    }
    return validationVerified;
    }

//end user

//backtotop
jQuery("#backtotop").click(function () {
    jQuery("body,html").animate({
        scrollTop: 0
    }, 600);
});
jQuery(window).scroll(function () {
    if (jQuery(window).scrollTop() > 150) {
        jQuery("#backtotop").addClass("visible");
    } else {
        jQuery("#backtotop").removeClass("visible");
    }
});
//end backtotop

//mobileview
$('<form action="#"><select /></form>').appendTo("#mainav");$("<option />",{selected:"selected",value:"",text:"MENU"}).appendTo("#mainav select");$("#mainav a").each(function(){var e=$(this);if($(e).parents("ul ul ul").length>=1){$("<option />",{value:e.attr("href"),text:"- - - "+e.text()}).appendTo("#mainav select")}else if($(e).parents("ul ul").length>=1){$("<option />",{value:e.attr("href"),text:"- - "+e.text()}).appendTo("#mainav select")}else if($(e).parents("ul").length>=1){$("<option />",{value:e.attr("href"),text:""+e.text()}).appendTo("#mainav select")}else{$("<option />",{value:e.attr("href"),text:e.text()}).appendTo("#mainav select")}});$("#mainav select").change(function(){if($(this).find("option:selected").val()!=="#"){window.location=$(this).find("option:selected").val()}});
//end mobileview

!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a(jQuery)}(function(a){function b(b){var c={},d=/^jQuery\d+$/;return a.each(b.attributes,function(a,b){b.specified&&!d.test(b.name)&&(c[b.name]=b.value)}),c}function c(b,c){var d=this,f=a(d);if(d.value==f.attr("placeholder")&&f.hasClass(m.customClass))if(f.data("placeholder-password")){if(f=f.hide().nextAll('input[type="password"]:first').show().attr("id",f.removeAttr("id").data("placeholder-id")),b===!0)return f[0].value=c;f.focus()}else d.value="",f.removeClass(m.customClass),d==e()&&d.select()}function d(){var d,e=this,f=a(e),g=this.id;if(""===e.value){if("password"===e.type){if(!f.data("placeholder-textinput")){try{d=f.clone().attr({type:"text"})}catch(h){d=a("<input>").attr(a.extend(b(this),{type:"text"}))}d.removeAttr("name").data({"placeholder-password":f,"placeholder-id":g}).bind("focus.placeholder",c),f.data({"placeholder-textinput":d,"placeholder-id":g}).before(d)}f=f.removeAttr("id").hide().prevAll('input[type="text"]:first').attr("id",g).show()}f.addClass(m.customClass),f[0].value=f.attr("placeholder")}else f.removeClass(m.customClass)}function e(){try{return document.activeElement}catch(a){}}var f,g,h="[object OperaMini]"==Object.prototype.toString.call(window.operamini),i="placeholder"in document.createElement("input")&&!h,j="placeholder"in document.createElement("textarea")&&!h,k=a.valHooks,l=a.propHooks;if(i&&j)g=a.fn.placeholder=function(){return this},g.input=g.textarea=!0;else{var m={};g=a.fn.placeholder=function(b){var e={customClass:"placeholder"};m=a.extend({},e,b);var f=this;return f.filter((i?"textarea":":input")+"[placeholder]").not("."+m.customClass).bind({"focus.placeholder":c,"blur.placeholder":d}).data("placeholder-enabled",!0).trigger("blur.placeholder"),f},g.input=i,g.textarea=j,f={get:function(b){var c=a(b),d=c.data("placeholder-password");return d?d[0].value:c.data("placeholder-enabled")&&c.hasClass(m.customClass)?"":b.value},set:function(b,f){var g=a(b),h=g.data("placeholder-password");return h?h[0].value=f:g.data("placeholder-enabled")?(""===f?(b.value=f,b!=e()&&d.call(b)):g.hasClass(m.customClass)?c.call(b,!0,f)||(b.value=f):b.value=f,g):b.value=f}},i||(k.input=f,l.value=f),j||(k.textarea=f,l.value=f),a(function(){a(document).delegate("form","submit.placeholder",function(){var b=a("."+m.customClass,this).each(c);setTimeout(function(){b.each(d)},10)})}),a(window).bind("beforeunload.placeholder",function(){a("."+m.customClass).each(function(){this.value=""})})}});

// Run It
jQuery(document).ready(function($) {
    $("input, textarea").placeholder();
});