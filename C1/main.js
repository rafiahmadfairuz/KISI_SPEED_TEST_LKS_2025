const body = document.body
body.addEventListener("click", function (e){
    let lingkaran = document.createElement("div")
    lingkaran.classList.add("circle")

    lingkaran.style.top = `${e.clientY - 15}px`
    lingkaran.style.left = `${e.clientX - 15}px`

    body.appendChild(lingkaran)
    setTimeout(() => {
        lingkaran.remove()
    }, 300);

})