
const quizData = [ 
    {
        question: "How often do you find yourself feeling overwhelmed or unable to cope with daily stressors?",
        a: "Yes",
        b: "No",
        c: "Prefer not to say",
    },
    {
        question: "Are you experiencing changes in your sleep patterns, such as difficulty falling asleep or staying asleep?",
        a: "Yes",
        b: "No",
        c: "Prefer not to say",
    },
    {
        question: "Do you often feel a sense of persistent sadness or emptiness that lasts for an extended period of time?",
        a: "Yes",
        b: "No",
        c: "Prefer not to say",
    },
    {
        question: "Have you noticed a significant change in your appetite, either eating more or less than usual?",
        a: "Yes",
        b: "No",
        c: "Prefer not to say",
    },
    {
        question: "Have you lost interest in activities that you used to enjoy, and do you find it challenging to muster enthusiasm for things you once loved?",
        a: "Yes",
        b: "No",
        c: "Prefer not to say",
       
    },
    {
        question: "Are you frequently irritable, agitated, or easily angered, even in situations that wouldn't normally bother you?",
        a: "Yes",
        b: "No",
        c: "Prefer not to say",
    },
    {
        question: "Do you experience physical symptoms such as headaches, muscle tension, or stomachaches that don't seem to have a clear physical cause?",
        a: "Yes",
        b: "No",
        c: "Prefer not to say",
    },
    {
        question: "Are you using substances like alcohol or drugs as a way to cope with your emotions?",
        a: "Yes",
        b: "No",
        c: "Prefer not to say",
    },
    {
        question: "Have you had thoughts of self-harm or suicide, or are you experiencing persistent feelings of hopelessness?",
        a: "Yes",
        b: "No",
        c: "Prefer not to say",
    },
    
];

const quiz= document.getElementById('quiz')
const answerEls = document.querySelectorAll('.answer')
const questionEl = document.getElementById('question')
const a_text = document.getElementById('a_text')
const b_text = document.getElementById('b_text')
const c_text = document.getElementById('c_text')
const submitBtn = document.getElementById('submit')
const quizContainer = document.querySelector('.quiz-container')

let currentQuiz = 0
window.onload = function () {
    quizContainer.classList.add('glowing');
};
loadQuiz()
function loadQuiz() {
    deselectAnswers()
    const currentQuizData = quizData[currentQuiz]
    questionEl.innerText = currentQuizData.question
    a_text.innerText = currentQuizData.a
    b_text.innerText = currentQuizData.b
    c_text.innerText = currentQuizData.c
}
function deselectAnswers() {
    answerEls.forEach(answerEl => answerEl.checked = false)
}
function getSelected() {
    let answer;
    answerEls.forEach(answerEl => {
        if(answerEl.checked) {
            answer = answerEl.id
        }
    })
    return answer
}
submitBtn.addEventListener('click', () => {
    const answer = getSelected()
       if (answer) {
        currentQuiz++ 
       if(currentQuiz < quizData.length) {
           loadQuiz()
       } else {
           quiz.innerHTML = `
           <h2>TestCompleted</h2>
           <button onclick="location.reload()">Go back to the main page</button>
           `
       }
    } else {
        alert("Please select an answer before proceeding to the next question.");
    }
}
); 
