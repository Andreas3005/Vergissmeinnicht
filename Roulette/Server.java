package Roulette;


import java.net.*;
import java.io.*;

public class Server {
    
    public static void main(String args[]) throws IOException {
/**
 * Erstellt den Server und erstellt einen neuen Socket wenn sich ein User darauf verbindet
 * 
 * 
 *
 */
        ServerSocket server = null;
        Socket client = null;
        
        try {
            server = new ServerSocket(4088);
        } catch(IOException e) {
            System.err.println("Probleme mit Port 4088.");
                    System.exit(-1);
        }

        while (true) {
            if (client == null) {
                client = server.accept();
            }

            if (client != null) {
                new RouletteThread(client).start();
                client = null;
            }
        } 
    } 
}