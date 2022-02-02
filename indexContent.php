
<div id="container">
<h1>File Upload and Download Template.</h1>
<br><br><br>
<div id="secondContainer">
        <table>
            <form action="" method="POST" enctype="multipart/form-data">
                <tr>
                    <td>File Name</td>
                    <td><input type="text" name="fileName"></td>
                </tr>
                <tr>
                    <td>Upload File</td>
                    <td><input type="file" name="myfile"></td>
                </tr>
                <tr>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" Value="Submit" name="submit">
                    </td>
                </tr>
            </form>
        </table>

        <br>

        <form action="" method="POST" enctype="multipart/form-data">
        <table>
                <tr>
                    <td colspan="2"><input type="text" name="search" id="search" placeholder="Search"></td>
                </tr>
            </table>
            
            <table style="overflow: hiddin; width: 50%; margin: 0 auto;"> 
            <div id="resultContainer">

            </div>
            </table>
            </form>
</div>
<h1>Search By Ajax System.</h1>
</div>
