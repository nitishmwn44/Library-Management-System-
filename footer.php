 </div>
        </div>






         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
         <script type="text/javascript">
            const tools= document.getElementById("tools");
            const triangle= document.getElementById("triangle");
            function opent()
            {
            tools.style.display="block";
            triangle.style.display="block";
            }
            function closet()
            {
            tools.style.display="none";
            triangle.style.display="none";    
            }
         </script>
         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                     $(this).toggleClass('active');
                 });
             });
         </script>
    </body>
</html>