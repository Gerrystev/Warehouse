<!DOCTYPE html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
        <link rel="stylesheet" href="css/EditGudang.css">
    <body>
        <!-- jumbotron-->
        <div class="jumbotron jumbotron-fluid" id="jumbotron" style="height: 300px; background-image: background-position: center; background-size: cover;">
            <div class="container">
                <h1 class="text1" style="text-align: center; font-family: NunitoBold;" onclick="home()">Storage Management</h1>
                <p class="text2" style="text-align: center; font-family: fontCode;">Manage your storage, manage your world</p>
            </div>
        </div>
            <!-- tabel list gudang-->
            <div id="name"></div>
            <div id="box">
                <div id="grid"></div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            var first_grid_width = 0;
            refreshGrid();
            $("#addPage").click(function(){
                window.location.href="../php/AddGudang.php";
            });

            $( window ).resize(function() {
                refreshBox();
            });

            function refreshBox(){
                var window_width = $( window ).width();
                $('#box').css({'width':window_width-100+'px'});
                $('#grid').css({'width':first_grid_width+'px'});

                var rw = $('.rowWidth').outerWidth();
                $('.gridCells').css({'width':50+'px'});
                var cw = $('.gridCells').outerWidth();
                $('.gridCells').css({'height':cw+'px'});
            }

            function refreshGrid(){
                var idgudang = <?php echo $_GET['id']; ?>;
                $.ajax({
                    url: 'sql/GetGudang_db.php',
                    type: 'GET',
                    datatype: 'json',
                    data: {
                        id:idgudang
                    },
                    success: function(response){
                        var responseJSON = $.parseJSON(response);
                        markup = responseJSON.output

                        $("#grid").html(markup);

                        if(first_grid_width == 0){
                            first_grid_width = 50*ukuran_x;
                        }

                        refreshBox();
                    }
			    });
            }

        });
        function home(){
            window.location.href = "../Home/homePage.php";
        }
    </script>
    </body>
</html>