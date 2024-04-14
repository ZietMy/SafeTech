
console.clear()

//create function to get random numbers between 2 numbers
function getRandomInt(min, max) {
	return Math.random() * (max - min) + min
}

//create the random transform 
const keyframeRandomMove = () => Math.floor(getRandomInt(-100, 100))

//create random animation to the page using style tag
const keyframesMove = (index) => `<style class="style-move-heart">
@keyframes move-heart-${index} {
  from {transform: translate(-50%, -50%); opacity: 1;}
  to {transform: translate(${keyframeRandomMove()}%, ${keyframeRandomMove()}%); opacity: 0;}
}
.move-heart-${index} {
	animation: move-heart-${index} 1s 0s ease-in-out forwards;
}
</style>`

//mini-heart structure
const heart = ({color, moveSideWise, moveUpOrDown}, index) => `
<svg viewBox="0 0 24 22" fill="${color}" xmlns="http://www.w3.org/2000/svg" class="sub-hearts move-heart-${index}" style="top:${moveSideWise()}%; left:${moveUpOrDown()}%;">
<path d="M11.0661 2.81728L11.6026 3.45246L12.1391 2.81728C13.2867 1.45859 15.0479 0.600098 16.8697 0.600098C20.0815 0.600098 22.6051 3.13599 22.6051 6.38807C22.6051 8.38789 21.72 10.2564 20.0229 12.3496C18.3175 14.4529 15.8645 16.6977 12.8407 19.4622L12.826 19.4756L12.8249 19.4766L11.6008 20.6001L10.3798 19.4879L10.3783 19.4866L10.3336 19.4457C10.3336 19.4457 10.3336 19.4457 10.3336 19.4457C7.31862 16.6834 4.87347 14.4409 3.17365 12.3404C1.4821 10.25 0.600098 8.38442 0.600098 6.38807C0.600098 3.13599 3.12361 0.600098 6.33544 0.600098C8.15729 0.600098 9.91845 1.45859 11.0661 2.81728Z" stroke="#333333" stroke-width="1"/>
</svg>`

//object with all info to create mini-hearts with random position
const heartsDirection = {
	numberOfHearts: () => Math.floor(getRandomInt(6, 10)), //random from 3 to 6
	moveSideWise: () => Math.floor(getRandomInt(0, 100)), //random from 0 to 70%
	moveUpOrDown: () => Math.floor(getRandomInt(0, 100)), //random from 0 to 70%
	color: '#00D0A6',
}

// consts
const heartContainer = () => document.querySelector('.heart-container')
const heartButton = () => document.querySelector('.add-to-wishlist')
const allSubHearts = () => document.querySelectorAll('.sub-hearts')
const jsStyleForAnimation = () => document.querySelectorAll('.style-move-heart')

// Object Destructuring to be used in for loop
const {numberOfHearts} = heartsDirection;


//click big-heart -> magic happen
heartButton()?.addEventListener('click', function (){
	this.classList.toggle('fill-heart')

	if(!this.matches('.fill-heart')) {
		allSubHearts().forEach(el => el.remove())
		jsStyleForAnimation().forEach(el => el.remove())
		return
	}

	//loop to apply mini-hearts to page
	for (let i = 1; i < numberOfHearts(); i++) {
		heartContainer().insertAdjacentHTML('beforeend', heart(heartsDirection, i))
		document.head.insertAdjacentHTML("beforeend", keyframesMove(i))
	}
})


