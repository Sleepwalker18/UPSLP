/********************************
*Israel Arellano Godinez		*
*Programación I					*
*Semestre:2	Primavera 2016		*
********************************/

#include<stdio.h>	//Librerias a utilizar
#include<conio.h>
#include<stdlib.h>
#include<time.h>
#include<windows.h>
#include<ctype.h>
#include<string.h>
#define LARGO 23
#define ALTO 23
#define ARRIBA 105 // cursor hacia arriba  i
#define IZQUIERDA 106 // cursor hacia la izquierda j
#define DERECHA 108 // cursor hacia la derecha l
#define ABAJO 107 // cursor hacia abajo k

struct player{												//Declaracion de la estructura
	
	char nom[100];											//nombre
	int	vidas;												//numero de vidas
	int no_mon;												//numero de monstruos
	 	
}registro;													//Nombre de la estructura

//Funciones a utilizar

void leer_portada();		//Portada desde archivo
void inicio();				//Pantalla de inicio				
char elegir();				//Elegir opcion
void controles();			//Controles del juego
void val_nombre(player &registro);	//Validacion del nombre con estructura
void salir();						//pantalla de salida
void genera_laberinto(char table[LARGO][ALTO],int i,int j);		//genera laberinto haciendo referencia al arreglo de caracteres en la posicion i,j
void objetivo1(int posx, int posy, int color);					//define las posiciones en i,j de caracter que se estara moviendo
void meta();													//posicion del objetivo al cual llegar
void mueve_objetivo1(char table[LARGO][ALTO],player &registro,int posxcar,int posycar,int x,int y,int x2,int y2,int x3,int y3,int x4,int y4,int x5,int y5);	//mueve el caracter que sera el que llegue al objetivo
void restar_vid_mon(player &registro);							//resta vidas al jugador por medio de la estructura
void actualiza_labe(char table[LARGO][ALTO],int *posx,int *posy,char tecla);	//actualiza la informacion del laberinto con la posicion del caracter que se estara moviendo
void ubica_info(player &registro);								//ubica en pantalla la informacion del jugador con la estructura
int fantasmas(char table[LARGO][ALTO],int x,int y,int x2,int y2,int x3,int y3,int x4,int y4,int x5,int y5);		//ubica los fantasmas en el laberino por referencia 
char reintentar();												//aqui se elige si volveras a jugar
void pantalla_bienvenida();										//pantalla de bienvenida con archivos
void gano();													//pantalla de jugador que gano con archivos
void juego_terminado();											//pantalla de que el juego termino con archivos
void gotoxy(int posx, int posy);								//manipular la posicion de ciertos datos en consola

main(){
	
	char opcion,again,labe[LARGO][ALTO]={0};		//Variables que seran llamadas por valor o por referencia en las funciones
	int l,a;
	int x=10+rand()%10,y=10+rand()%10,x2=5+rand()%15,y2=5+rand()%15,x3=15+rand()%5,y3=15+rand()%5,x4=5+rand()%10,y4=5+rand()%10,x5=10+rand()%10,y5=10+rand()%10;
	int posxcar=1,posycar=1;
	
	struct player registro;										//Apertura de la estructura
	
	leer_portada();	
	pantalla_bienvenida();													//Pantalla de bienvenida al juego
	
		do{		
			inicio();											//Pantalla de inicio
			opcion=elegir();									//Elegir opcion
				switch(opcion){									//Leer opcion
					case '1':									//1
						do{
							registro.vidas=3;								//Da el numero de vidas
							fflush(stdin);						//Limpia buffer
							val_nombre(registro);					//Pide nombre
							genera_laberinto(labe,l,a);							//Crea el laberinto
							registro.no_mon=fantasmas(labe,x,y,x2,y2,x3,y3,x4,y4,x5,y5);		//Genera el numero de monstruos
							ubica_info(registro);						//Ubica la informacion del jugador
							mueve_objetivo1(labe,registro,posxcar,posycar,x,y,x2,y2,x3,y3,x4,y4,x5,y5);		//Mueve el caracter
							again=reintentar();						//Te pide si quieres volver a jugar
						}while(again=='1');							//Mientras volver a jugar sea 1 repetira el ciclo
						salir();									//Si no imprime la pantalla de salida
						Sleep(3000);						
					break;
					case '2':					//2
						salir();				//Imprime la pantalla de salida
					break;
					case '3':
						controles();						//Teclas a usar
					break;
					default:					//Si es otra opcion
						printf("\nOpci%cn no valida\nIntente de nuevo:",162);		//Imprime que el dato no es valido
						fflush(stdin);
					break;
				}	
		}while(opcion!='1' && opcion!='2');				//Mientras que la opcion sea diferente de 1,2 y 3
	
	getch();
	
}

void leer_portada(){							//Funcion para leer el archivo de la portada
	
	FILE *arch,*fich;
	char resp[100],tecla;
	int a,tam_cad,i,j=0;
	
	do{
	system("cls");
	
	arch=fopen("upslp.txt","r");				//Abre archivos a usar
	fich=fopen("port-1.txt","r");						
	
	if(arch!=NULL){								//Si el archivo no esta vacio
		j=0;
		while(!feof(arch)){		
			gotoxy(3,j+3);							//Posicion donde comenzara el archivo
			for(i=0;i<37;i++){						//Margen del archivo
				fscanf(arch,"%d",&a);				//Leer datos del archivo,lo toma como entero
				SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),a);			//Lo lee como color
				putchar(219);														//Imprime el caracter 219 con el color del archivo
			}
			j++;
		}
		fclose(arch);								//Cierra el archivo
	}	
	
		if(fich!=NULL){
		j=0;
		while(!feof(fich)){
			gotoxy(40,j+3);
			for(i=0;i<37;i++){//margen
				fscanf(fich,"%d",&a);
				SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),a);
				putchar(219);
			}
			j++;
		}
		SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),63);
	     gotoxy(42,6);
	     printf("UPSLP.");
	     gotoxy(42,8);
	     printf("Alumno:Israel Arellano Godinez.");
	     gotoxy(42,9);
	     printf("(150389)");
	     gotoxy(42,11);
	     printf("Programacion I.");
	     gotoxy(42,13);
	     printf("Semestre Primavera 2016.");
	     gotoxy(42,15);
	     printf("Docente:Roxana Georgina");
	     gotoxy(42,16);
	     printf("Herrera Herrera");
			fclose(arch);
		}	
		SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),14);
		gotoxy(18,25);
		printf("<-PRESIONE LA TECLA S PARA CONTINUAR->");							//Pide presionar la tecla s para continuar
	
		
			fflush(stdin);	
			scanf("%[^\n]",resp);		//Lee la cadena de elegir datos
			tam_cad=strlen(resp);		//obtiene el tamaño de la cadena
			
				if(tam_cad==1){			
					tecla=resp[0];		//Si el tamaño de la cadena es 1 lo almacena en la opcion
				}
				else{
					printf("\nDato invalido\nIntente de nuevo:"); 		//Si no sera un dato invalido
				}
																			
	}while(tecla!='s' && tecla!='S'); //mientras no sea la tecla s repetira el ciclo										
	
}

void inicio(){				//Funcion que imprime la pantalla de incio
	
	system("cls");
	
	FILE *entrada;
	char car;
	entrada=fopen("reglas.txt","r");							//Abre el archivo de las reglas del juego
	system("cls");
	
	SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),15);		//Imprime mensaje de las reglas del juego
	if(entrada!=NULL)
	{
		while(!feof(entrada)){
			car=getc(entrada);
			putchar(car);
		}
		fclose(entrada);
	}	
	SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),11);
	printf("\n\n%cUsted dese%c continuar?",168,160);
	SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),10);
	printf("\n\n1=Si");
	SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),12);
	printf("\t2=No");
	SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),14);
	printf("\t3=Ayuda\n\n");
	SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),11);
	printf("Escriba su respuesta:");								//Pregunta si desea continuar
	SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),15);
	
}

char elegir(){					//Funcion para elegir opcion
	
	int tam_cad,opc;						
	char resp[100];
	
		do{		
		
			fflush(stdin);	
			scanf("%[^\n]",resp);		//Lee la cadena de elegir datos
			tam_cad=strlen(resp);		//obtiene el tamaño de la cadena
			
				if(tam_cad==1){			
					opc=resp[0];		//Si el tamaño de la cadena es 1 lo almacena en la opcion
				}
				else{
					printf("\nDato invalido\nIntente de nuevo:"); 		//Si no sera un dato invalido
				}
		}while(tam_cad!=1);				//Y mientras el tamaño de la cadena sea diferente de 1 se repetira el ciclo
	
	return opc;		//Regresara el valor de la opcion
}

void controles(){			//Funcion que imprime los controles del juego
		
	char conti,resp[100];
	int tam_cad;
	
	do{
		system("cls");						
		gotoxy(15,1);
		SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),14);
		printf("Bien, ahora te brindo los controles para jugar:");
		SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),7);
		gotoxy(5,3);
		printf("TECLAS");
		SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),15);		
		gotoxy(5,5);
		printf("i: Arriba");
		gotoxy(5,6);
		printf("k: Abajo");
		gotoxy(5,7);
		printf("l: Derecha");
		gotoxy(5,8);
		printf("j: Izquierda");
		SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),10);
		gotoxy(15,15);
		printf("<-PRESIONE LA TECLA R PARA REGRESAR->");
		
			fflush(stdin);	
			scanf("%[^\n]",resp);		//Lee la cadena de elegir datos
			tam_cad=strlen(resp);		//obtiene el tamaño de la cadena
			
				if(tam_cad==1){			
					conti=resp[0];		//Si el tamaño de la cadena es 1 lo almacena en la opcion
				}
				else{
					printf("\nDato invalido\nIntente de nuevo:"); 		//Si no sera un dato invalido
				}
																			
	}while(conti!='R' && conti!='r');			//Imprime las teclas a usar hasta que presiones r
	
}

void val_nombre(player &registro){			//Funcion para leer el nombre
		
		int i,cad,error;
		system("cls");
		
		fflush(stdin);	
		do{
			error=0;
			
			fflush(stdin);	//Limpia el buffer
			
			SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),14);
			gotoxy(20,15);
			printf("AHORA INTRODUZCA SU NOMBRE:");
			
			SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),15);
			scanf("%[^\n]",registro.nom);											//Lee la cadena
			cad=strlen(registro.nom);												//obtiene el tamaño de la cadena para verificar caracter por caracter
			
			i=0;
				while(i<cad){
					if(!isalpha(registro.nom[i]) && registro.nom[i]!= 32){					//Si la cadena es diferente de un caracter incluyendo el espacio
						error=1;											//Hay error
						printf("\n\tDato invalido\n\tIntente de nuevo");	//Imprime que es invalido el nombre
						Sleep(1000);
						system("cls");
					break;
					}
					else{
						i++;												//Si no sigue verificando la cadena
					}
				}
		}while(error==1);													//Mientras que no haya error leera la cadena

}

void salir(){			//Funcion para imprimir la salida
	
	system("cls");			//Limpia la pantalla
	
	FILE *fiche;
	int a,i,j=0;
	fiche=fopen("salir.txt","r");						//Abre el archivo de salida
	
	if(fiche!=NULL){
		j=0;
		while(!feof(fiche)){
			gotoxy(25,j+3);								//Posicion de inicio
			for(i=0;i<26;i++){								//margen
				fscanf(fiche,"%d",&a);					//abre el archivo con formato,toma los valores del archivo como enteros y se los asigna a la localidad de 'a'
				SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),a);	//segun el valor,es el color que imprimira
				putchar(219);													//imprime el caracter 219 con el color de 'a'
			}
			j++;										//Brinca un renglon
		}	
		fclose(fiche);									//Cierra el archivo
	}	
	
}

void genera_laberinto(char table[LARGO][ALTO],int i,int j){			//Funcion para generar el laberinto
	
	int car,mons=4;
	system("cls");
	srand(time(0));
	fflush(stdin);
		for(i=0;i<ALTO;i++){										//Ciclo que comienza a definir el tamaño de la tabla
			for(j=0;j<LARGO;j++){			
				car=0;
				if((j>0 && j<ALTO-1) && (i>0 && i<LARGO-1)){		//Se define la condición del contenido de la tabla 	
			  
					SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),11);
					
					car=rand()%4;									//El ciclo genera un numero random
					
					if(car==0){
						table[j][i]=219;							//Si el random es 0 imprime paredes
					}
					else{
						table[j][i]=32;								//Si no imprime espacios
					}
					
					if(j==i){
						table[j][i]=32;								//Si el arreglo en j es igual a i va imprimiendo una linea recta directo a la esquina opuesta
					}
					
					table[1][2]=table[2][1]=table[20][21]=table[21][20]=32;  //Abre las casillas externas a los objetivos
					printf("%c",table[j][i]);	
									
																
				}
				else{
					table[i][j]=219;					//Si no se cumple la condicion del contenido de la tabla se dibuja el margen
					SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),14);
					printf("%c",table[i][j]);	
				}
			}
			printf("\n");
		}
}

void objetivo1(int posx, int posy,int color){	//Funcion para generar el objetivo
	
	int i,j,temporal;								
	
	SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),color);
	temporal=posx;
	for(i=0;i<1;i++,posy++)												//En la posicion 1 en i se ira aumentando la posicion en i
		for(j=0,posx=temporal;j<1;j++,posx++)							//Mientras que en j menor a la temporal se aumentara la posicion
		{
			gotoxy(posx,posy);
			printf("%c",35);											//Imprime la posicion
		}
}

void meta(){ 			//Funcion para imprimir el objetivo
	
	int x,y;												
	x=21,y=21;
	gotoxy(x,y);     
	SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),12);
	printf("%c",3);//Esquina inferior derecha
	
}

void mueve_objetivo1(char table[LARGO][ALTO],player &registro,int posxcar,int posycar,int x,int y,int x2,int y2,int x3,int y3,int x4,int y4,int x5,int y5){
	
	//Funcion para mover el caracter
	
	char tecla;	
	
	meta();
	objetivo1(posxcar,posycar,10);
	tecla=0;
	
	do{		
	 	 if(kbhit())  //SI SE HA PRESIONADO UNA TECLA
	 	  {
	 	    tecla=getch();									//Lee la tecla
	 	    objetivo1(posxcar,posycar,0);					//Ubica el caracter en la posicion inicial
	 	    actualiza_labe(table,&posxcar,&posycar,tecla); //actualiza posiciones
	     	objetivo1(posxcar,posycar,10);					//Ubica donde estara el caracter
				if(posxcar==x && posycar==y){				//si la posicion del caracter es igual a la de un monstruo
					if(registro.no_mon==1 || registro.no_mon==2){					//Verifica cuantos monstruos hay
						gotoxy(x,y);						//Si hasy 1 o 2
						printf(" ");						//Limpia ese monstruo
						registro.no_mon=registro.no_mon;							//Deja el numero de monstruos
						registro.vidas--;							//Resta una vida
						restar_vid_mon(registro);			//LLama la funcion para actualizar datos
						x=1+rand()%15;						//Reubica el monstruo
						y=1+rand()%15;
						gotoxy(x,y);						
						printf("%c",32);
						posxcar=posycar=1;					//Regresa el caracter a la posicion incial
						gotoxy(posxcar,posycar);			//Lo imprime en esa posicion
						SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),10);
						printf("%c",35);					//Lo imprime en esa posicion
					}
					else{									//Sino
						gotoxy(x,y);						
						printf(" ");
						registro.vidas--;							//Resta una vida y un monstruo
						registro.no_mon--;
						restar_vid_mon(registro);		
						x=3;								//Manda el fantasma a una zona donde no hay nada
						y=40;
						posxcar=posycar=1;					//Reubica el caracter
						gotoxy(posxcar,posycar);	
						SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),10);
						printf("%c",35);					//lo imprime
					}
										
				}	
				else if(posxcar==x2 && posycar==y2){
					if(registro.no_mon==1 || registro.no_mon==2){
						gotoxy(x2,y2);
						printf(" ");
						registro.no_mon=registro.no_mon;
						registro.vidas--;
						restar_vid_mon(registro);		
						x2=1+rand()%15;
						y2=1+rand()%15;
						gotoxy(x2,y2);
						printf("%c",32);
						posxcar=posycar=1;
						gotoxy(posxcar,posycar);
						SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),10);
						printf("%c",35);	
					}
					else{
						gotoxy(x2,y2);
						printf(" ");
						registro.vidas--;
						registro.no_mon--;
						restar_vid_mon(registro);		
						x2=3;
						y2=40;
						posxcar=posycar=1;
						gotoxy(posxcar,posycar);
						SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),10);
						printf("%c",35);
					}
								
				}	
				else if(posxcar==x3 && posycar==y3){
					if(registro.no_mon==1 || registro.no_mon==2){
						gotoxy(x3,y3);
						printf(" ");
						registro.no_mon=registro.no_mon;
						registro.vidas--;
						restar_vid_mon(registro);		
						x3=1+rand()%15;
						y3=1+rand()%15;
						gotoxy(x3,y3);
						printf("%c",32);
						posxcar=posycar=1;
						gotoxy(posxcar,posycar);
						SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),10);
						printf("%c",35);	
					}
					else{
						gotoxy(x3,y3);
						printf(" ");
						registro.vidas--;
						registro.no_mon--;
						restar_vid_mon(registro);		
						x3=3;
						y3=40;
						posxcar=posycar=1;
						gotoxy(posxcar,posycar);
						SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),10);
						printf("%c",35);
					}	
					
				}	
				else if(posxcar==x4 && posycar==y4){
					if(registro.no_mon==1 || registro.no_mon==2){
						gotoxy(x4,y4);
						printf(" ");
						registro.no_mon=registro.no_mon;
						registro.vidas--;
						restar_vid_mon(registro);		
						x4=1+rand()%15;
						y4=1+rand()%15;
						gotoxy(x4,y4);
						printf("%c",32);
						posxcar=posycar=1;
						gotoxy(posxcar,posycar);
						SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),10);
						printf("%c",35);	
					}
					else{
						gotoxy(x4,y4);
						printf(" ");
						registro.vidas--;
						registro.no_mon--;
						restar_vid_mon(registro);		
						x4=3;
						y4=40;
						posxcar=posycar=1;
						gotoxy(posxcar,posycar);
						SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),10);
						printf("%c",35);
					}
					
				}
				else if(posxcar==x5 && posycar==y5){
					
					if(registro.no_mon==1 || registro.no_mon==2){
						gotoxy(x5,y5);
						printf(" ");
						registro.no_mon=registro.no_mon;
						registro.vidas--;
						restar_vid_mon(registro);		
						x5=1+rand()%15;
						y5=1+rand()%15;
						gotoxy(x5,y5);
						printf("%c",32);
						posxcar=posycar=1;
						gotoxy(posxcar,posycar);
						SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),10);
						printf("%c",35);	
					}
					else{
						gotoxy(x5,y5);
						printf(" ");
						registro.vidas--;
						registro.no_mon--;
						restar_vid_mon(registro);		
						x5=3;
						y5=40;
						posxcar=posycar=1;
						gotoxy(posxcar,posycar);
						SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),10);
						printf("%c",35);
					}
					
				}	
				
				if(registro.vidas==0){				//Si las vidas son 0 rompe el ciclo
					break;
				}
		}
	    tecla=0;
			
	}while(posxcar!=21 || posycar!=21);				//Mientras que la posicion del caracter sea diferente a la de la meta

	if(posxcar==21 && posycar==21){					//Si es igual a la de la meta llama a la funcion de ganar
		gano();
	}
	else if(registro.vidas==0){								//Si vidas es igual a 0 muestra pantalla de juego terminado
		juego_terminado();
		Sleep(3000);
	}

}

void restar_vid_mon(player &registro){			//Funcion para restar vidas
	
	
			SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),14);				
			gotoxy(40,7);
			printf("Vidas: %d",registro.vidas);				//Imprime las vidas sobrantes
					
					if(registro.vidas==1){
						SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),12);
						gotoxy(40,7);
						printf("Vidas: %d %cCUIDADO!",registro.vidas,173);	//Si solo queda 1 vida lanza mensaje de advertencia
					}	
								
				SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),13);
				gotoxy(40,9);
				printf("Monstruos: %d\t%c",registro.no_mon,2);		//Imprime los monstruos sobrantes
					
					if(registro.no_mon==2 || registro.no_mon==1){
						SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),11);
						gotoxy(40,9);
						printf("Monstruos: %d %cOjo! Ya no bajara",registro.no_mon,173,2);  //Si solo son 1 o 2 monstruos lanza mensaje de que se reubicaran si pasa sobre ellos
					}
	
}

void actualiza_labe(char table[LARGO][ALTO],int *posx,int *posy,char tecla){ 		//Funcion para actualizar la posicion del caracter en el laberinto
	
	char pared;			
	
	pared=219;						//Se define el caracter de la pared
			
		switch(tecla)
		{
		      case ARRIBA: // hacia arriba
		        if(table[*posx][*posy-1]!=pared){ 		//Si es diferente a una pared			
					*posy=*posy-1;					
				}
		         break;
		      case IZQUIERDA: // hacia la izquierda
				if(table[*posx-1][*posy]!=pared){		//Si es diferente a una pared
					*posx=*posx-1;
				}			
		         break;
		      case DERECHA: // hacia la derecha
		      	if(table[*posx+1][*posy]!=pared){		//Si es diferente a una pared
					*posx=*posx+1;
				}
		         break;
		       case ABAJO: // hacia abajo
		         if(table[*posx][*posy+1]!=pared){		//Si es diferente a una pared
		         	*posy=*posy+1;
		         	
				 }
		        break;
		        default:						//Si no, no hace nada
		        	*posx=*posx;
		        	*posy=*posy;
		        break;
		}

		tecla=0;
}

int fantasmas(char table[LARGO][ALTO],int x,int y,int x2,int y2,int x3,int y3,int x4,int y4,int x5,int y5){	  	
	
	//Funcion para imprimir fantasmas
	
	int conta=0;
	do{
		if(table[x][y]==32){				//Verifica si la casilla esta libre
			gotoxy(x,y);					//Ubica ahi al monstruo
			SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),15);
			printf("%c",32);				//lo imprime
			conta++;						//aumenta un contador que servira para definir cuantos mosntruos hay
		}
	
		if(table[x2][y2]==32){
			gotoxy(x2,y2);
			SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),15);
			printf("%c",32);
			conta++;
		}
	
		if(table[x3][y3]==32){
			gotoxy(x3,y3);
			SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),15);
			printf("%c",32);
			conta++;
		}
	
		if(table[x4][y4]==32){
			gotoxy(x4,y4);
			SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),15);
			printf("%c",32);
			conta++;
		}
	
		if(table[x5][y5]==32){
			gotoxy(x5,y5);
			SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),15);
			printf("%c",32);
			conta++;
		}
		
		if(conta>=1){				//Si el numero de monstruos es mayor es mayor o igual a 1 rompe el ciclo
			break;
		}
		
	}while(conta>=1);				//Mientras el numero de monstruos sea mayor o igual a 1

		return conta;				//Regresa el valor de ese contador
	
}

void ubica_info(player &registro){				//Funcion que ubica la informacion dell jugador
	
	SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),15);			//Utiliza la funcion gotoxy para posicionar los datos
	gotoxy(40,5);
	printf("Player: %s",registro.nom);
	SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),10);
	printf("\t%c",35);
	gotoxy(40,7);
	printf("Vidas: %d",registro.vidas);
	gotoxy(40,9);
	printf("Monstruos: %d",registro.no_mon);
	gotoxy(40,11);
	printf("Objetivo");
	SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),12);
	printf("\t%c",3);
	
}

char reintentar(){								//Funcion para definir si quiere volver a jugar
	
	int tam_cad;
	char resp[100],opc;
	
		do{		
			SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),14);
			fflush(stdin);
			system("cls");
			printf("\n\n\n\n\t%cDESEA INTENTAR DE NUEVO?",168);	
			printf("\n\n\n\n\t1-SI\tNO-2: ");
			scanf("%[^\n]",resp);	
			tam_cad=strlen(resp);							//lee el tamaño de la cadena
				if(tam_cad==1){
					opc=resp[0];							//Verifica el valor de la cadena en el primer caracter
				}
				else{
					SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),15);	//Si no el dato es invalido
					printf("\nDato invalido");						
					Sleep(2000);
				}
		}while(opc!='1' && opc!='2');		//mientras que el tamaño de la cadena sea diferente a 1 y la opcion sea diferente a 1
	
	return opc;
	
}

void pantalla_bienvenida(){				//Funcion que imprime la pantalla de bienvenida
	
	system("cls");
	int aste;
	char conti;
	
	printf("\n\t");
	fflush(stdin);
	SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),12);				//Utiliza ciclos para dibujar un margen paso por paso
	for(aste=0;aste<65;aste++){	
		printf("*");
		Sleep(25);
	}
	
	SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),10);
	for(aste=0;aste<20;aste++){
		printf("\n\t*\t\t\t\t\t\t\t\t*");
		Sleep(25);
	}	
	
	SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),12);
	printf("\n\t");
	for(aste=0;aste<65;aste++){	
		printf("*");
		Sleep(25);
	}																	
																	//Ubica el nombre del laberinto en el centro del margen
	SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),14);
	gotoxy(19,9);printf("%c    %c%c%c%c%c %c%c%c   %c%c%c   %c%c  %c%c%c%c%c  %c%c%c  %c  %c",178,178,178,178,178,178,178,178,178,178,178,178,178,178,178,178,178,178,178,178,178,178,178,178);
	gotoxy(19,10);printf("%c    %c   %c %c  %c %c   %c %c  %c %c   %c %c_  %c %c  %c",178,178,178,178,178,178,178,178,178,178,178,178,178,178,178);
	gotoxy(19,11);printf("%c    %c%c%c%c%c %c%c%c  %c     %c%c%c  %c%c%c%c%c   %c_  %c%c%c%c",178,178,178,178,178,178,178,178,178,178,178,178,178,178,178,178,178,178,178,178,178,178,178);
	gotoxy(19,12);printf("%c    %c   %c %c  %c %c   %c %c  %c %c   %c %c   %c %c  %c",178,178,178,178,178,178,178,178,178,178,178,178,178,178,178);
	gotoxy(19,13);printf("%c%c%c%c %c   %c %c%c%c   %c%c%c  %c  %c %c   %c  %c%c%c  %c  %c",178,178,178,178,178,178,178,178,178,178,178,178,178,178,178,178,178,178,178,178,178);

	Sleep(4000);
}

void gano(){					//Funcion que muestra si el jugador gano

	FILE *fichero;
	char car;
	fichero=fopen("winner.txt","r");
	system("cls");
	SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),11);
	printf("\n\tYOU:\n\n\n");
	
	SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),10);		//Imprime serie de caracteres que forman la palabra WIN
	if(fichero!=NULL)
	{
		while(!feof(fichero)){											//Mientras no sea el final del archivo
			car=getc(fichero);											//leera caracter por caracter el archivo
			putchar(car);												//imprime caracter por caracter
		}
		fclose(fichero);												//cierra el archivo
	}	
		
	Sleep(4000);
	
}

void juego_terminado(){		//Funcion que muestra si el jugador perdio
	
	system("cls");
	
	FILE *arch;
	char car;
	arch=fopen("game-over.txt","r");					//Abre el archivo de ganador
	system("cls");
	
	SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),12);		//Imprime serie de caracteres que forman la palabra WIN
	if(arch!=NULL)
	{
		while(!feof(arch)){
			car=getc(arch);
			putchar(car);
		}
		fclose(arch);
	}	
		
	Sleep(2500);

}

void gotoxy(int posx, int posy){	// Funcion para manipular posicion de datos en pantalla
     
	 HANDLE hConsoleOutput;
     COORD coord;
     hConsoleOutput = GetStdHandle (STD_OUTPUT_HANDLE);
     coord.X = posx; 
     coord.Y = posy;
     SetConsoleCursorPosition (hConsoleOutput, coord);
     
}

