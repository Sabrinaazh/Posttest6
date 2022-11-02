// alert("SELAMAT DATANG")
function check()
    {
        let cb = document.getElementById('cb').checked;
        if(cb == true)
        {
            document.getElementById('kepala').classList.remove('header');
            document.getElementById('container').classList.remove('konten');
            document.getElementById("kepala").classList.add("headerDark");
            document.getElementById('container').classList.add('dark');
                
        }

        else
        {
            document.getElementById('kepala').classList.remove("headerDark");
            document.getElementById('container').classList.remove('dark');
            document.getElementById("kepala").classList.add('header');
            document.getElementById('container').classList.add('konten');
        }
    }

    let button = document.getElementById('info');
    button.addEventListener("click", function(){
        let x = document.getElementById("more");
        if(x.style.display == "none")
        {
            x.style.display = "block";
        }

        else
        {
            x.style.display = "none";
        }
    })