<!DOCTYPE html>
<html>
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
</head>
<body>
<table id="example"  width="100%">
 <thead>
 <tr>
 <th>Name</th>
 <th>Position</th>
 <th>Office</th>
 <th>Age</th>
 <th>Start date</th>
 <th>Salary</th>
 </tr>
 </thead>
 <tbody>
 <tr>
 <td>Tiger Nixon</td>
 <td>System Architect</td>
 <td>Edinburgh</td>
 <td>61</td>
 <td>2011/04/25</td>
 <td>$320,800</td>
 </tr>
 <tr>
 <td>Garrett Winters</td>
 <td>Accountant</td>
 <td>Tokyo</td>
 <td>63</td>
 <td>2011/07/25</td>
 <td>$170,750</td>
 </tr>
 <tr>
 <td>Ashton Cox</td>
 <td>Junior Technical Author</td>
 <td>San Francisco</td>
 <td>66</td>
 <td>2009/01/12</td>
 <td>$86,000</td>
 </tr>
 <tr>
 <td>Cedric Kelly</td>
 <td>Senior Javascript Developer</td>
 <td>Edinburgh</td>
 <td>22</td>
 <td>2012/03/29</td>
 <td>$433,060</td>
 </tr>
 <tr>
 <td>Airi Satou</td>
 <td>Accountant</td>
 <td>Tokyo</td>
 <td>33</td>
 <td>2008/11/28</td>
 <td>$162,700</td>
 </tr>
 <tr>
 <td>Brielle Williamson</td>
 <td>Integration Specialist</td>
 <td>New York</td>
 <td>61</td>
 <td>2012/12/02</td>
 <td>$372,000</td>
 </tr>
 <tr>
 <td>Herrod Chandler</td>
 <td>Sales Assistant</td>
 <td>San Francisco</td>
 <td>59</td>
 <td>2012/08/06</td>
 <td>$137,500</td>
 </tr>
 <tr>
 <td>Rhona Davidson</td>
 <td>Integration Specialist</td>
 <td>Tokyo</td>
 <td>55</td>
 <td>2010/10/14</td>
 <td>$327,900</td>
 </tr>
 <tr>
 <td>Colleen Hurst</td>
 <td>Javascript Developer</td>
 <td>San Francisco</td>
 <td>39</td>
 <td>2009/09/15</td>
 <td>$205,500</td>
 </tr>
 <tr>
 <td>Sonya Frost</td>
 <td>Software Engineer</td>
 <td>Edinburgh</td>
 <td>23</td>
 <td>2008/12/13</td>
 <td>$103,600</td>
 </tr>
 <tr>
 <td>Jena Gaines</td>
 <td>Office Manager</td>
 <td>London</td>
 <td>30</td>
 <td>2008/12/19</td>
 <td>$90,560</td>
 </tr>
 <tr>
 <td>Quinn Flynn</td>
 <td>Support Lead</td>
 <td>Edinburgh</td>
 <td>22</td>
 <td>2013/03/03</td>
 <td>$342,000</td>
 </tr>
 <tr>
 <td>Charde Marshall</td>
 <td>Regional Director</td>
 <td>San Francisco</td>
 <td>36</td>
 <td>2008/10/16</td>
 <td>$470,600</td>
 </tr>
 <tr>
 <td>Haley Kennedy</td>
 <td>Senior Marketing Designer</td>
 <td>London</td>
 <td>43</td>
 <td>2012/12/18</td>
 <td>$313,500</td>
 </tr>
 <tr>
 <td>Tatyana Fitzpatrick</td>
 <td>Regional Director</td>
 <td>London</td>
 <td>19</td>
 <td>2010/03/17</td>
 <td>$385,750</td>
 </tr>
 
</tbody>
</table>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>

<script>
$(document).ready(function() {  
$('#example').DataTable( {
 dom: 'Bfrtip',
 buttons: [
 'copyHtml5',
 'excelHtml5',
 'csvHtml5',
 'pdfHtml5'
 ]
 } );
} );
</script>

</body>
</html>