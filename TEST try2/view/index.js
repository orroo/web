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
  

const errorMessage = document.getElementById('error-message');

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
        displaySuggestion(totalScore);
      }
    } else {
      errorMessage.style.display = 'inline'; 
      errorMessage.classList.remove('bounce'); 
      void errorMessage.offsetWidth; 
      errorMessage.classList.add('bounce'); 
    }
  });

  function displaySuggestion(score) {
    const totalScore = userResponses.reduce((sum, score) => sum + score, 0);
  
    let suggestionText = '';
    if (totalScore > 10) {
      suggestionText = 'Consider joining our intensive mental health program.';
    } else if (totalScore > 5) {
      suggestionText = 'You may benefit from our moderate mental health program.';
    } else {
      suggestionText = 'You are doing well, but do not hesitate to seek support if needed.';
    }
      window.location.href = `suggestions.html?suggestion=${encodeURIComponent(suggestionText)}`;
  }
  




