async function fetchNotes() {
  const res = await fetch("get_notes.php");
  const notes = await res.json();
  const container = document.getElementById("notes");
  container.innerHTML = "";
  notes.forEach((note) => {
    const div = document.createElement("div");
    div.className = "note";
    div.innerHTML = `
          <input type="text" value="${note.title}" id="title-${note.id}">
          <textarea id="content-${note.id}">${note.content}</textarea>
          <button onclick="updateNote(${note.id})">Зберегти</button>
          <button onclick="deleteNote(${note.id})">Видалити</button>
        `;
    container.appendChild(div);
  });
}

async function updateNote(id) {
  const title = document.getElementById(`title-${id}`).value;
  const content = document.getElementById(`content-${id}`).value;
  await fetch("update_note.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ id, title, content }),
  });
  fetchNotes();
}

async function deleteNote(id) {
  await fetch("delete_note.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ id }),
  });
  fetchNotes();
}

document.getElementById("noteForm").addEventListener("submit", async (e) => {
  e.preventDefault();
  const title = document.getElementById("title").value;
  const content = document.getElementById("content").value;

  if (!title.trim() || !content.trim()) return alert("Заповніть усі поля!");

  await fetch("add_note.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ title, content }),
  });

  e.target.reset();
  fetchNotes();
});

fetchNotes();
