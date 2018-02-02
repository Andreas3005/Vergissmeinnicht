package Roulette;

import java.net.*;
import java.io.*;
import java.util.*;



public class Client {

    BufferedReader br;
    int status;
    int moneyk;

/**
 * Verbindet sich zum Server
 * Ließt die Zahlen ein und übergiebt sie den Server
 * Danach gibt es aus ob man die Zahl getroffen hat
 * @throws IOException
 */
    
    Client() throws IOException {
        Socket server = new Socket ("localhost", 4088);
        InputStream input = server.getInputStream();
        OutputStream output = server.getOutputStream();
        br = new BufferedReader( new InputStreamReader(System.in));
        status = 0;

        
        while (status == 0|| status == 1 ) {
            System.out.println("Geben Sie bitte 2 verschiedene Zahlen zwischen 0 und 36 ein und den jeweiligen Gelbetrag zwischen 1 und 10.");
            
            int zahl1 = 100;
            while (!korrekteEingabe(zahl1)) {
                System.out.print("Zahl1: ");
                zahl1 = Integer.parseInt( br.readLine() );  
            }
            output.write( zahl1 );
            output.flush();

            int money1 = 110;
            while (!korrekteEingabeMoney(money1)) {
                System.out.print("money1: ");
                money1 = Integer.parseInt( br.readLine() );
            }
            output.write( money1 );
            output.flush();

            
            int zahl2 = 100;
            while (!korrekteEingabe(zahl2)) {
                System.out.print("zahl2: ");
                zahl2 = Integer.parseInt( br.readLine() );
            }
            output.write( zahl2 );
            output.flush();

            
            int money2 = 110;
            while (!korrekteEingabeMoney(money2)) {
                System.out.print("money2: ");
                money2 = Integer.parseInt( br.readLine() );
            }
            output.write( money2 );
            output.flush();

      

            
            status = input.read();
            moneyk = input.read();
            if(status == 0) {
                System.out.println("Spielen sie nocheinmal. Ihr neuer Kontostand ist 1"+ moneyk);
            }
            else {
                System.out.println("Treffer. Sie haben gewonnen. Ihr neuer Kontostand ist"+ moneyk);
            }
            int zufall = input.read();
                System.out.println("Die Zahl ist: "+ zufall);
        }

        
        
        server.close();
        input.close();
        output.close();
    }
    
    public boolean korrekteEingabe(int zahl) {
            if(zahl < 36) {
                return true;
        }
        return false;
    }
    public boolean korrekteEingabeMoney(int money) {
        if(money < 10) {
           
                return true;
        }
        return false;
    }


    public static void main(String[] args) {
        try {   
            Client client = new Client ();
        } catch (IOException e){
            System.out.print(e);
        }
                    
   
    }

}

 