const quizData = [ 
    {
        question: "How often do you find yourself feeling overwhelmed or unable to cope with daily stressors?",
        answers: [
          { text: "Yes", score: 2 },
          { text: "No", score: 0 },
          { text: "Prefer not to say", score: 1 },
        ],
      },
      {
        question: "Are you experiencing changes in your sleep patterns, such as difficulty falling asleep or staying asleep?",
        answers: [
          { text: "Yes", score: 2 },
          { text: "No", score: 0 },
          { text: "Prefer not to say", score: 1 },
        ],
      },
    {
        question: "Do you often feel a sense of persistent sadness or emptiness that lasts for an extended period of time?",
        answers: [
            { text: "Yes", score: 2 },
            { text: "No", score: 0 },
            { text: "Prefer not to say", score: 1 },
        ],
    },
    {
        question: "Have you noticed a significant change in your appetite, either eating more or less than usual?",
        answers: [
            { text: "Yes", score: 2 },
            { text: "No", score: 0 },
            { text: "Prefer not to say", score: 1 },
        ],
    },
    {
        question: "Have you lost interest in activities that you used to enjoy, and do you find it challenging to muster enthusiasm for things you once loved?",
        answers: [
            { text: "Yes", score: 2 },
            { text: "No", score: 0 },
            { text: "Prefer not to say", score: 1 },
        ],
    },
    {
        question: "Are you frequently irritable, agitated, or easily angered, even in situations that wouldn't normally bother you?",
        answers: [
            { text: "Yes", score: 2 },
            { text: "No", score: 0 },
            { text: "Prefer not to say", score: 1 },
        ],
    },
    {
        question: "Do you experience physical symptoms such as headaches, muscle tension, or stomachaches that don't seem to have a clear physical cause?",
        answers: [
            { text: "Yes", score: 2 },
            { text: "No", score: 0 },
            { text: "Prefer not to say", score: 1 },
        ],
    },
    {
        question: "Are you using substances like alcohol or drugs as a way to cope with your emotions?",
        answers: [
            { text: "Yes", score: 2 },
            { text: "No", score: 0 },
            { text: "Prefer not to say", score: 1 },
        ],
    },
    {
        question: "Have you had thoughts of self-harm or suicide, or are you experiencing persistent feelings of hopelessness?",
        answers: [
            { text: "Yes", score: 2 },
            { text: "No", score: 0 },
            { text: "Prefer not to say", score: 1 },
        ],
    },
    
];

const quiz = document.getElementById('quiz');
const questionEl = document.getElementById('question');
const answersContainer = document.getElementById('answers-container');
const submitBtn = document.getElementById('submit');

let currentQuiz = 0;
let userResponses = [];

window.onload = function () {
  loadQuiz();
};

function loadQuiz() {
  const currentQuizData = quizData[currentQuiz];
  questionEl.innerText = currentQuizData.question;
  displayAnswers(currentQuizData.answers);
}

function displayAnswers(answers) {
  answersContainer.innerHTML = '';

  answers.forEach(answer => {
    const answerElement = document.createElement('li');
    answerElement.innerHTML = `
      <input type="radio" name="answer" class="answer" value="${answer.text}" id="${answer.text}">
      <label for="${answer.text}" id="${answer.text}_text">${answer.text}</label>
    `;
    answersContainer.appendChild(answerElement);
  });
}

function getSelectedAnswer() {
    const selectedAnswerText = getSelected('answer');
    if (selectedAnswerText === '') {
      return null; 
    }
  
    const currentQuizData = quizData[currentQuiz];
    const selectedAnswer = currentQuizData.answers.find(answer => answer.text === selectedAnswerText);
    
    return { score: selectedAnswer.score };
  }
  

  function getSelected(questionName) {
    const answerEls = document.getElementsByName(questionName);
    for (const answerEl of answerEls) {
      if (answerEl.checked) {
        return answerEl.value;
      }
    }
    return '';
  }
  

document.addEventListener('DOMContentLoaded', function() {
  const submitBtn = document.getElementById('submit');
  const errorMessage = document.getElementById('error-message');


  if (submitBtn && errorMessage) {
submitBtn.addEventListener('click', () => {
    const selectedAnswer = getSelectedAnswer();
    if (selectedAnswer) {
      userResponses.push(selectedAnswer.score);
      errorMessage.style.display = 'none'; 
     currentQuiz++;
     
     if (currentQuiz < quizData.length) {
       loadQuiz();
      } else {
        const totalScore = userResponses.reduce((sum, score) => sum + score, 0);

        console.log('Total Score:', totalScore);
       // window.location.href = 'suggestions.html';       
        generatePDF(totalScore);
       
      

      } 
    } else {
      errorMessage.style.display = 'inline'; 
      errorMessage.classList.remove('bounce'); 
      void errorMessage.offsetWidth; 
      errorMessage.classList.add('bounce'); 
    }
  }); } });


  function generatePDF(totalScore) {
    //const totalScore = userResponses.reduce((sum, score) => sum + score, 0);
    let pdfURL = ''; 
    if (totalScore > 10) {
      
      var score=2;
  } else if (totalScore > 5) {
      
      var score=1;
  } else {
      
      var score=0;
  } 
  console.log('PDF URL:', pdfURL);
  const newWindow =window.open("finquiz.php?score="+score);
  
    if (newWindow) {
      
        newWindow.focus();
    } 

  }
  
