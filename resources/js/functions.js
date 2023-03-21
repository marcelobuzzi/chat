const msgerForm  = get(".msger-inputarea");
const msgerInput = get(".msger-input");
const msgerChat  = get(".msger-chat");
const PERSON_IMG = "img/user.png";
const chatWith   = get(".chat-with");
const typing     = get(".typing");
const chatStatus = get(".chat-status");
const chat_id    = get("#chat-id");

msgerForm.addEventListener("submit", event => {

  event.preventDefault();

  const msgText = msgerInput.value;
  if(!msgText) return;

  axios.post('/chat/message/sent', {
    'message' : msgText,
    'chat_id' : chat_id.value
  }).then(res => {
    let data         = res.data;
    let current_date = formatDate(new Date(data.created_at));
    appendMessage(data.user.lastname + ', ' + data.user.name, PERSON_IMG, 'right', data.content, current_date);
  }).catch(error => {
    console.log(error);
  });

  msgerInput.value = "";

});

function appendMessage(name, img, side, text, date) {

  const msgHTML = `
    <div class="msg ${side}-msg">
      <div class="msg-img" style="background-image: url(${img})"></div>

      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name">${name}</div>
          <div class="msg-info-time">${date}</div>
        </div>

        <div class="msg-text">${text}</div>
      </div>
    </div>
  `;

  msgerChat.insertAdjacentHTML("beforeend", msgHTML);
  msgerChat.scrollTop += 500;

}

Echo.join('chat.' + chat_id.value).listen('MessageEvent', event => {
  console.log(event);
})

function get(selector, root = document) {
  return root.querySelector(selector);
}

function formatDate(date) {
  const d = date.getDate();
  const mo = date.getMonth() + 1;
  const y = date.getFullYear();
  const h = "0" + date.getHours();
  const m = "0" + date.getMinutes();

  return `${d}/${mo}/${y} ${h.slice(-2)}:${m.slice(-2)}`;
}