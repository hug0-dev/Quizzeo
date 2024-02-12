document.addEventListener("DOMContentLoaded", function () {
    const addButton = document.getElementById("add-question");
    const form = document.querySelector("form");
    let questionIndex = 1;

    addButton.addEventListener("click", function () {
        questionIndex++;

        const newQuestionSet = document.createElement("div");
        newQuestionSet.innerHTML = `
        <label>Question ${questionIndex}</label>
        <p></p>
        <input type="text" name="intituleQuestion${questionIndex}" placeholder="Intitulé Question" required>
    `;

        form.insertBefore(newQuestionSet, addButton);

        for (let i = 1; i <= 3; i++) {
            const responseField = document.createElement("input");
            responseField.type = "text";
            responseField.name = `reponse${questionIndex}_${i}`;
            responseField.placeholder = `Réponse ${i}`;
            responseField.required = true;
            newQuestionSet.appendChild(responseField);
        }

        const selectField = document.createElement("select");
        selectField.name = `bonneReponse${questionIndex}`;
        for (let i = 1; i <= 3; i++) {
            const option = document.createElement("option");
            option.value = i;
            option.text = `Réponse ${i}`;
            selectField.appendChild(option);
        }
        newQuestionSet.appendChild(selectField);

        document.getElementById("totalQuestions").value = questionIndex;
    });
});