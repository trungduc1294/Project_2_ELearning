console.log(2);
let form = document.getElementById('lobby__form')


let displayName = sessionStorage.getItem('display_name')
if (displayName) {
  form.name.value = displayName
}

form.addEventListener('submit', e => {
  e.preventDefault()

  sessionStorage.setItem('display_name', e.target.name.value)

  let inviteCode = e.target.room.value
  if (!inviteCode) {
    inviteCode = String(Math.floor(Math.random() * 10000))
  }
  // window.location = `room.html?room=${inviteCode}`
  window.location = `/teacher/courses-detail/1/join-room?room=${inviteCode}`
})
