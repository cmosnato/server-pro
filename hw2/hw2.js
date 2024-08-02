function wave(input) {
    let word = new Array();
    if (input.length >= 10) {
        for (let i = 0; i < input.length; i++) {
            let char = input.charAt(i);
            let upper = char.toUpperCase();
            let newword = input.slice(0, i) + upper + input.slice(i + 1);
            word.push(newword);
        }
    } else {
        word.push("please enter vocab letter >= 10");
    }
    return word;
}

input = prompt("Enter your word >= 10", "Ex. cmoscmark");
input = input.toLowerCase(); 
let result = wave(input);
console.log(result);