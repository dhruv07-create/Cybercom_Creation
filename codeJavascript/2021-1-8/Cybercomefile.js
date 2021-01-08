var johnMass,markMass,johnHeight,markHeight;

johnMass=prompt("Enter johnMass");
johnHeight=prompt("Enter johnHeight");

markMass=prompt("Enter markMass");
markHeight=prompt("Enter markHeight");

var jBMI,mBMI;

jBMI=johnMass /(johnHeight*johnHeight);
mBMI=markMass /(markHeight*markHeight);

var check=mBMI > jBMI;

console.log("Is Mark's BMI higher than John's ?"+" :-"+check);