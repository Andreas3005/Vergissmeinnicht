package Roulette;


import java.net.*;
import java.io.*;
import java.util.Random;


public class RouletteThread extends Thread {
  
    Socket client;
    InputStream input;
    OutputStream output;
    int status;
    int moneyk = 100;

    public RouletteThread(Socket client){
        this.client = client;
    }
    /*
     * Liest dei eingegebenen Zahlen ein und übprüft sie. 
     * Wenn falsch dann wird das eingegebene Geld abgezogen.
     * Wenn richtig dann wird das eingegebene Geld man 36 gerechnet
     * Danach wird ein Status zurückgegeben
     * 
     */
    public void run() {
            try{
            	status = 0;
                
                while(status == 0|| status == 1 ) {
                
            InputStream input = client.getInputStream();
            OutputStream output = client.getOutputStream();
            status = 0;
           
        
           
                int zahl1 = input.read();
                int money1 = input.read();
                int zahl2 = input.read();
                int money2 = input.read();
               
                

                Random r = new Random();
                int zufall = r.nextInt(37);
                
                if(zahl1 == zufall ){
                   
                    status = 1;
                    moneyk = moneyk + money1 * 36;
            
                }
                else{
                    
                    status = 0;
                    moneyk = moneyk - money1;
                }
                   
                if(zahl2 == zufall ){
                   
                    status = 1;
                    moneyk = moneyk + money2 * 36;
            
                }
                else{
                   
                    if(status == 0) {
                    	status = 0;
                    }
                    
                    moneyk = moneyk - money2;
                }
                output.write(status);
                output.write(moneyk);
                output.write(zufall);
                output.flush();
                      
                }
            input.close();
            output.close();
            client.close();
           
    }

        catch(Exception e){
        	
              
        }
    }
}
    