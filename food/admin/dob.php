<html>

<head>
<style>
    .error{
        color: red;
    }
</style>
</head>

<body>
    <input type="text" id="txtDate" onchange="ValidateDOB()" placeholder="dd/mm/yyyy format only">
    <span class="error" id="lblError"></span>
    <br />
    <br />
</body>
<script type="text/javascript">
    function ValidateDOB() {
        var lblError = document.getElementById("lblError");

        var dateString = document.getElementById("txtDate").value;
        var regex = /(((0|1)[0-9]|2[0-9]|3[0-1])\/(0[1-9]|1[0-2])\/((19|20)\d\d))$/;

        if (regex.test(dateString)) {
            var parts = dateString.split("/");
            var dtDOB = new Date(parts[1] + "/" + parts[0] + "/" + parts[2]);
            var dtCurrent = new Date();
            lblError.innerHTML = "Only 14+ are allowed"
            if (dtCurrent.getFullYear() - dtDOB.getFullYear() < 15) {
                return false;
            }

            if (dtCurrent.getFullYear() - dtDOB.getFullYear() == 15) {

                if (dtCurrent.getMonth() < dtDOB.getMonth()) {
                    return false;
                }
                if (dtCurrent.getMonth() == dtDOB.getMonth()) {

                    if (dtCurrent.getDate() < dtDOB.getDate()) {
                        return false;
                    }
                }
            }
            lblError.innerHTML = "you are allowed to proceed";
            return true;
        } else {
            lblError.innerHTML = "Enter date in dd/MM/yyyy format ONLY."
            return false;
        }
    }
</script>

</html>