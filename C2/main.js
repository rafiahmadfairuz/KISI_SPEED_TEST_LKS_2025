const canvas = document.getElementById("canvas")
const posisi = document.getElementById("posisi")
const ctx = canvas.getContext("2d")

canvas.style.border = "1px solid"

let posisiX = 100
let posisiY = 100
let targetX = 100
let targetY = 100

canvas.addEventListener("mousemove", function (e) {
    targetX = e.clientX - canvas.getBoundingClientRect().left
    targetY = e.clientY - canvas.getBoundingClientRect().top
})

function ball(x, y) {
   ctx.clearRect(0, 0, canvas.width, canvas.height)
   ctx.beginPath()
   ctx.arc(x, y, 50, 0, Math.PI * 2)
   ctx.fillStyle = "green"
   ctx.strokeStyle = "red"
   ctx.lineWidth = "10"
   ctx.stroke()
   ctx.fill()
}

function delay() {
    posisiX += (targetX - posisiX) * 0.1
    posisiY += (targetY - posisiY) * 0.1

    ball(posisiX, posisiY)
    requestAnimationFrame(delay)
}

delay()
