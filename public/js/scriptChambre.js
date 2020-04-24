var typeCh = document.getElementById("typeCh");
var forfait = document.getElementById("forfaitCh");
//alert("Ok");
if(typeCh!== null) {
    typeCh.addEventListener("change", function () {
        if (typeCh.value === "meublé") {
            forfait.value = "/jour";
        } else {
            forfait.value = "/mois";
        }
    });
}
$(document).ready(function() {
    //$('#listChambre').DataTable();
    $('#dateDiv').fadeOut(0, function () {});
    var choixCh = $('#choixChambre');
    var dateEnt = $('#dateDebut');
    var dateSortie = $('#dateSortie');
    var mntLoc  = $('#montantLoc');


    console.log(choixCh[0]);

    if(choixCh !== "" && choixCh[0] !== undefined) {
        $.ajax({
            url: '/MKB/public/ajax/chambreController.php',
            type: 'GET',
            data: { testTypeCh: choixCh[0].value },
            success: function(data) {
                if (data === '1') {
                    $('#dateDiv').fadeIn(1000, function () {});
                    $('#addLocataire').attr('disabled',true);
                } else
                {
                    dateEnt[0].value = "";
                    dateSortie[0].value = "";
                    mntLoc.attr('value',"");
                    $('#dateDiv').fadeOut(0, function () {});
                    $('#addLocataire').removeAttr('disabled');
                }
            }
        });
        choixCh.change(function () {
           // console.log(choixCh[0].value);
            $.ajax({
                url: '/MKB/public/ajax/chambreController.php',
                type: 'GET',
                data: { testTypeCh: choixCh[0].value },
                success: function(data) {
                    if (data === '1') {
                        $('#dateDiv').fadeIn(1000, function () {});
                        $('#addLocataire').attr('disabled',true);
                    } else
                    {
                        dateEnt[0].value = "";
                        dateSortie[0].value = "";
                        mntLoc.attr('value',"");
                        $('#dateDiv').fadeOut(0, function () {});
                        $('#addLocataire').removeAttr('disabled');
                    }
                }
            });
        });



        dateSortie.change(function () {
            verifierDate();
        });
        dateEnt.change(function () {
            verifierDate();
        });

        function GetSelected () {
            var select = document.getElementById ("choixChambre");
            for (var i = 0; i < select.options.length; i++) {
                var isSelected = select.options[i].selected;
                if(isSelected)
                {
                    return select.options[i].textContent;
                }
            }
        }
        function verifierDate() {
            if(dateEnt[0].value < dateSortie[0].value)
            {
               // console.log(GetSelected());
                var mntJour = GetSelected().split(' - ')[GetSelected().split(' - ').length-1];
               // console.log(mntJour);
                let mnt = (((dateSortie[0].valueAsDate - dateEnt[0].valueAsDate)/24)/3600000) * mntJour;
               // console.log(mnt);
                mntLoc.attr('value',mnt);
                $('#addLocataire').removeAttr('disabled');
            }
            else
            {
                //console.log(dateSortie[0].value);
                if(dateSortie[0].value !== "")
                    alert("LA DATE DE SORTIE NE PEUT ETRE INFERIEURE A LA DATE D'ENTREE");
                mntLoc.attr('value',"");
                $('#addLocataire').attr('disabled',true);
            }
        }
    }
} );