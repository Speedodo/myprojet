let active = true;
let player1 = true;
let player2 = false;
let value;
let empty = "";
let winningconditions = [[0,1,2],[3,4,5],[6,7,8],
                         [0,3,6],[1,4,7],[2,5,8],
                         [0,4,8],[2,4,6]]

        let board = ["","","","","","","","",""]

   function comparewin(board) {
    for (let T = 0; T < winningconditions.length; T++) {
        const [a, b, c] = winningconditions[T];
        
        if (board[a] && board[a] === board[b] && board[a] === board[c]) {
            console.log("someone has won!");
            
            
            return true;
        }
    }
    console.log("nobody has won yet");
    return false;
}


document.getElementById("start").onclick  = function(){



for (let i = 0; i<9;i++){

    document.getElementById(i).onclick = function(){

        if(player1 && document.getElementById(i).textContent === empty){
            document.getElementById("status").textContent = "Player 2 turn";
            
            
        value = "X";
        document.getElementById(i).textContent = value;
        player2= true;
        player1= false;

        board[i] = "X";

        


        if(comparewin(board)){
            console.log("player 1 has won")
            document.getElementById("status").textContent = "player 1 has won"
        }





            

    
    }else if(player2 && document.getElementById(i).textContent === empty){
        document.getElementById("status").textContent = "Player 1 turn";
        
            
        
            value = "O";
        document.getElementById(i).textContent = value;
        player2= false;
        player1= true;
        
        board[i] = "O";
        

        if(comparewin(board)){
            console.log("player 2 has won")
            document.getElementById("status").textContent = "player 2 has won"

        }
        }
        else{
            console.log("this spot is already taken  player2:   ");
            console.log(player2plays);
            console.log("player1:")
            console.log(player1plays);
        }


        document.getElementById("restartButton").onclick = function(){

            for(let J = 0; J < 9 ; J++){
                
                board[J]= "";

                document.getElementById(J).textContent = "";
                console.log("game has reset");
            }

        }
        

}

}
}
