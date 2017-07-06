
// We check the connection between our UI and the OPC Server with an "Heartbeat" function
// We check that the value read is different than the previous, if no then there is a communication issue
// For that, the PLC changes the value every 100ms

$(function() {

    $.ajax({

        type: 'GET',
        url: 'api/get_param.php',
        success: function(response) {
            if (response !== "error") {
                adrIPOPC = response;
            } else {
                $.toast({
                    heading: "erreur",
                    text: "Attention, " + response,
                    showHideTransition: 'slide',
                    position: "bottom-center",
                    icon: 'error'
                });

            }
        }
    });

    valPrec = 0;
    valBitVie = 0;
    window.setInterval(function() {
        // At a defined interval rate, we read the variables
        window.propriete = []
        propriete.commOK = false;
        adrBitVie = "read?ids=train.api1.Bit_Vie";
        $.ajax({
            url: adrIPOPC + adrBitVie,
            type: 'GET',
            async: true,
            datatype: 'application/json; charset=utf-8',
            // If the request is successful, then we read the value of the variable
            // Si la requete reussi, on va lire la valeur de la variable.
            success: function(data) {
                valBitVie = data.readResults[0].v;
                if (valBitVie !== valPrec) {
                    // We save the variable in the local storage of the app
                    localStorage.setItem("commOK", true);
                    // Here we change the graphical interface to show that the connection is "OK"
                    $("#etatComm").removeClass("red-text");
                    $("#etatComm").addClass("light-green-text");
                    $("#etatComm").html("OK");
                    valPrec = valBitVie;

                } else {
                    localStorage.setItem("commOK", false);
                    // Here we change the UI to show that the connection is in "DEFAULT"
                    $("#etatComm").removeClass("light-green-text");
                    $("#etatComm").addClass("red-text");
                    $("#etatComm").html("Défaut");

                }
            },
            error: function(request, status, errorThrown) {
                propriete.commOK = false;
                //En cas d'erreur, on affiche défaut.
                $("#etatComm").removeClass("light-green-text");
                $("#etatComm").addClass("red-text");
                $("#etatComm").html("Défaut");
            }
        });
    }, 1500);

        });

// Here, we read the variable of the OPC Server
// If you want to read an element, it should contain the class varOPC + other classes, refer to the documentation for more information
// To adapt the answer from the server to the app, we have many options available.
        // For example, if the element read is a button, then if the answer is true, we'll act on the "active" state of the button
        // If the element is text, we'll use the html() function of JQuery.

$(document).ready(function() {

// PROGRAMME A TESTER
    window.setInterval(function() {
        // We check that the connection is ok
        if (true) {

// http://127.0.0.1:39320/iotgateway/read?ids=Channel1.Device1.Defaut_T7&ids=Channel1.Device1.Defaut_T9

                $.ajax({
                    url: adrIPOPC+ 'browse',
                    type: 'GET',
                    datatype: 'application/json; charset=utf-8',
                    // If the request is successful, we read the result.
                    success: function(data) {
                        var varVal;
                        var idVar=[];
                        var getURL='';
                        for (var i = 0 ; i<data.browseResults.length; i++) {
                            
                             idVar[i]= data.browseResults[i].id;
                             if (i===0){
                                getURL="ids="+idVar[0];
                             }
                             getURL=getURL+"&ids="+idVar[i];
                        }

                        $.ajax({
                                            url: adrIPOPC+'read?'+getURL,
                                            type: 'GET',
                                            datatype: 'application/json; charset=utf-8',
                                            // If the request is successful, we read the result.
                                            success: function(data) {
                                                var idVar;
                                                for (var i = 0 ; i<data.readResults.length; i++) {
                                                    idVar=data.readResults[i].id
                                                    if (idVar.includes("Train.API1")) {

                                                        var idVarConcat = idVar.replace("Train.API1.", "");
                                                    }
                                                    else if (idVar.includes("Train.API2.")) {
                                                        var idVarConcat = idVar.replace("Train.API2.", "");
                                                    }

                                                     localStorage.setItem(idVarConcat,data.readResults[i].v);
                                                }                                              

                                            // },
                                            // error: function(request, status, errorThrown) {
                                            //     $.toast({
                                            //         heading: "erreur",
                                            //         text: "Une erreur s'est produite : " + request + status + errorThrown,
                                            //         showHideTransition: 'slide',
                                            //         position: "bottom-center",
                                            //         icon: 'error'
                                            //     });
                                            }
                                        });

                    // },
                    // error: function(request, status, errorThrown) {
                    //     $.toast({
                    //         heading: "erreur",
                    //         text: "Une erreur s'est produite : " + request + status + errorThrown,
                    //         showHideTransition: 'slide',
                    //         position: "bottom-center",
                    //         icon: 'error'
                    //     });
                    }
                });
        }
    }, 200);

    //! PROGRAMME A TESTER
    window.setInterval(function() {
        // We check that the connection is ok
        if (true) {

            
            $(".varOPC").each(function() {
                var btnID = this.id;

                // We memorize the  ID of the var read
                       var varVal= localStorage.getItem(btnID);

                        // We adapt the answer received so the app reacts correctly
                        if ($('#' + btnID).hasClass("opcText")) {
                            $("#" + btnID).val(varVal);
                        }
                        else if ($('#' + btnID).hasClass("opcButton")) {
                            console.log("toto");
                            console.log(varVal);
                            if (varVal == "true") {
                                // $('#' + btnID).addClass('active');
                            $('#' + btnID).addClass('active');
                            } else if (varVal == "false") {
                                // $('#' + btnID).removeClass('active');
                                $('#' + btnID).removeClass('active');
                            }
                        } else if ($('#' + btnID).hasClass("opcSwitch")) {
                            typevar = "Switch";
                            if (varVal == "true") {
                                $('#' + btnID).prop('checked', true);
                            } else if (varVal == "false") {
                                $('#' + btnID).prop('checked', false);
                            }

                        } else {
                            $.toast({
                                heading: "erreur",
                                text: "La variable " + btnID + " était programmée comme " + typevar + ",mais la valeur retournée ne correspond pas. Valeur reçue = " + varVal,
                                showHideTransition: 'slide',
                                position: "bottom-center",
                                icon: 'error'
                            });
                        }
                    });
                }

    }, 500);
    // We check if we are connected to the server.
});
    

        $(document).ready(function() {
            if (true) {
            $(document).on("click", ".opcWrite", function() {

                var idvar = this.id;
                // Here we check if the var is in the api
                var api = "api1";
                if ($(this).hasClass("api2")) {
                    api = "api2"
                } else {
                    api = "api1"
                }

                if ($("#" + idvar).hasClass("varOPC")) {
                    // If the button is at the state "active" then when we press it we want to set the value to inactive. That's why we're checking it now.
                    if ($("#" + idvar).hasClass("active") && $("#" + idvar).hasClass("opcButton")) {
                        var swEtat = "false";

                    } else {
                        var swEtat = "true";
                    }
                    // Same logic but for switches
                    if ($("#" + idvar).is(":checked") && $("#" + idvar).hasClass("opcSwitch")) {
                        var swEtat = "true";
                    } else if ($("#" + idvar).hasClass("opcSwitch")) {
                        var swEtat = "false";
                    }


                    // Here, we execute the request we've built before.
                    $.ajax({
                        type: "POST",
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        datatype: 'application/json',
                        url: "http://192.168.0.30:39320/iotgateway/write",
                        data: "[{ \"id\": \"train." + api + "." + idvar + "\", \"v\": " + swEtat + "}]",
                        success: function(response) {

                            if (response.writeResults[0].r !== "") {
                                $.toast({
                                    heading: "erreur",
                                    text: "Une erreur s'est produite le serveur indique : " + response.writeResults[0].r,
                                    showHideTransition: 'slide',
                                    position: "bottom-center",
                                    icon: 'error'
                                });
                            } else {

                                $.toast({
                                    heading: "C'est un succès!",
                                    text: 'La variable a bien été mise à jour',
                                    showHideTransition: 'slide',
                                    position: "bottom-center",
                                    icon: 'success'
                                });
                            }

                        },
                        error: function(request, status, errorThrown) {
                            $.toast({
                                heading: "erreur",
                                text: "Une erreur s'est produite : " + request + status + errorThrown,
                                showHideTransition: 'slide',
                                position: "bottom-center",
                                icon: 'error'
                            });
                        }

                    });
                }
            });
        };


        //Writing with push buttons.
        //Push buttons work only when pressed, then they return to the false state
        $(document).ready(function() {
            // Detecting the press of the button, then setting the variable
            $("body").on("mousedown", ".opcPushBtn", function() {
                var idvar = this.id;

                var api = "api1";
                if ($(this).hasClass("api2")) {
                    api = "api2"
                } else {
                    api = "api1"
                }

                swEtat = true;
                $.ajax({
                    type: "POST",
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    datatype: 'application/json',
                    url: "http://192.168.0.30:39320/iotgateway/write",
                    data: "[{ \"id\": \"train." + api + "." + idvar + "\", \"v\": " + swEtat + "}]",
                    success: function(response) {

                        if (response.writeResults[0].r !== "") {
                            $.toast({
                                heading: "erreur",
                                text: "Une erreur s'est produite le serveur indique : " + response.writeResults[0].r,
                                showHideTransition: 'slide',
                                position: "bottom-center",
                                icon: 'error'
                            });
                        } else {

                            $.toast({
                                heading: "C'est un succès!",
                                text: 'La variable a bien été mise à jour',
                                showHideTransition: 'slide',
                                position: "bottom-center",
                                icon: 'success'
                            });
                        }

                    },
                    error: function(request, status, errorThrown) {
                        $.toast({
                            heading: "erreur",
                            text: "Une erreur s'est produite : " + request + status + errorThrown,
                            showHideTransition: 'slide',
                            position: "bottom-center",
                            icon: 'error'
                        });
                    }

                });

            });
            // Detecting the button release
            $("body").on("mouseup", ".opcPushBtn", function() {
                var idvar = this.id;
                var api = "api1";
                if ($(this).hasClass("api2")) {
                    api = "api2"
                } else {
                    api = "api1"
                }

                swEtat = false;
                $.ajax({
                    type: "POST",
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    datatype: 'application/json',
                    url: "http://192.168.0.30:39320/iotgateway/write",
                    data: "[{ \"id\": \"train." + api + "." + idvar + "\", \"v\": " + swEtat + "}]",
                    success: function(response) {

                        if (response.writeResults[0].r !== "") {
                            $.toast({
                                heading: "erreur",
                                text: "Une erreur s'est produite le serveur indique : " + response.writeResults[0].r,
                                showHideTransition: 'slide',
                                position: "bottom-center",
                                icon: 'error'
                            });
                        } else {

                            $.toast({
                                heading: "C'est un succès!",
                                text: 'La variable a bien été mise à jour',
                                showHideTransition: 'slide',
                                position: "bottom-center",
                                icon: 'success'
                            });
                        }

                    },
                    error: function(request, status, errorThrown) {
                        $.toast({
                            heading: "erreur",
                            text: "Une erreur s'est produite : " + request + status + errorThrown,
                            showHideTransition: 'slide',
                            position: "bottom-center",
                            icon: 'error'
                        });
                    }

                });

            });



            // In case we want to set a value with a text input
            $("body").on("change", ".opcWriteText", function() {

                var idvar = this.id;
                var value = $(this).val();

                $.ajax({
                    type: "POST",
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    datatype: 'application/json',
                    url: "http://192.168.0.30:39320/iotgateway/write",
                    data: "[{ \"id\": \"train.api1." + idvar + "\", \"v\": " + value + "}]",
                    success: function(response) {

                        if (response.writeResults[0].r !== "") {
                            $.toast({
                                heading: "erreur",
                                text: "Une erreur s'est produite le serveur indique : " + response.writeResults[0].r,
                                showHideTransition: 'slide',
                                position: "bottom-center",
                                icon: 'error'
                            });
                        } else {

                            $.toast({
                                heading: "C'est un succès!",
                                text: 'La variable a bien été mise à jour',
                                showHideTransition: 'slide',
                                position: "bottom-center",
                                icon: 'success'
                            });
                        }

                    },
                    error: function(request, status, errorThrown) {
                        $.toast({
                            heading: "erreur",
                            text: "Une erreur s'est produite : " + request + status + errorThrown,
                            showHideTransition: 'slide',
                            position: "bottom-center",
                            icon: 'error'
                        });
                    }

                });

            });
        });
    });
