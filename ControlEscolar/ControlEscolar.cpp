/********************************************************************************************
/Alumno: Israel Arellano Godinez															/
/Laboratorio de programación II 															/
/Grupo:D 		Semestre:Otoño 2016														    /
********************************************************************************************/

#include<stdio.h>
#include<conio.h>
#include<stdlib.h>																	//Librerias a utilizar
#include<windows.h>
#include<string.h>
#include<ctype.h>

using namespace std;

struct arbol{
	
	char no_al[100];
	int matricula;							//Estructura arbol donde se guardan todos los datos de los alumnos y se utilizan 2 punteros para la
	float calif;							//generacion del arbol
	struct arbol *derecha;
	struct arbol *izquierda;
	
};

struct arbol *raiz;							//Puntero principal

void leer_portada();						//Funcion que lee la portada
void bienvenida();							//Funcion que muestra lo que hace el programa
char menu();								//Funcion menu
int leer_desde_ar();						//Funcion que lee los datos del archivo
void inorden(struct arbol *aux,int &i,int gpo); //Funcion que ordena el arbol
void imprime_arbol(struct arbol *aux,int i,int j,int &sep,int gpo); //Funcion que imprime el arbol
int selec_grupo(int ngp);					//Funcion para selecciona grupo
int valida(char valida[100],int ngp);		//Funcion que valida la insercion de datos
void separar_gpo(struct arbol *aux,int &i,int gpo,float sep_gp[]);	//Funcion que separa los grupos
void obtener_nombre(struct arbol *aux,int &i,int gpo,float sep_gp[],float cal);	//Funcion que lee el nombre de cierto alumno
void tab1();								//Funcion de la posicion de la tabla de grupos
void tab_gp();								//Funcion de la posicion de la tabla de promedios
void gotoxy(int posx, int posy);			//Funcion para manipular la posicion de los datos

main(){
	
	int no_alum,no_gp,i=40,j=1,k,l,conta,conta_j,conta_sep,gpo,check=0;							//variables a utilizar
	char opc,opc_most;																	
	
	leer_portada();														//Muestra portada
	bienvenida();														//Se muestra la pantalla de bienvenida	
	no_alum=leer_desde_ar();											//El numero de alumnos es obtenido por la funcion que lee el archivo
	no_gp=no_alum/20;													//el numero de grupos es igual al numero de alumnos entre 20
	SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),15);
	gotoxy(42,20);
	printf("PRESIONE CUALQUIER TECLA PARA CONTINUAR");
	getch(); 
	
	float prom_gp[no_alum],prom_real[no_gp],temp,cal_alt_baj;			//Se definen arreglos para promedios totales,y promedios de grupo,un temporal
																		//y una variable para calificacion alta y baja
																		
	do{
		opc=menu();												//Se guarda el valor que retorna la funcion en la variable
	
			switch(opc){										//sentencia de seleccion multiple
				case '1':			
					do{
						system("cls");
						SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),15);
						printf("\n\n\n\t\t\t1.-Mostrar en tabla.\n\n\t\t\t2.-Mostrar como arbol.\n\n\n\t\tOPCION->");  
						SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),10);
						scanf("%c",&opc_most);															  
										
						if(opc_most=='1'){									//Mostrar como tabla
							system("cls");
							conta_sep=0;									//contador que se mandara por referencia
							gpo=selec_grupo(no_gp);							//Seleccion del grupo
							tab1();											//tabla
							inorden(raiz,conta_sep,gpo);					//se manda el puntero principal,el contador y que grupo eligio
							gotoxy(8,21);
							for(k=0;k<62;k++){printf("%c",238);}			//Se cierra la tabla
							getch();
						}
						
						else if(opc_most=='2'){								//Mostrar como arbol
							conta_sep=0;
							gpo=selec_grupo(no_gp);
							system("cls");
							SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),15);
							gotoxy(20,0);
							printf("PRESIONE CUALQUIER TECLA PARA CONTINUAR");
							imprime_arbol(raiz,i,j,conta_sep,gpo);			//Se manda la posicion inicial del arbol
							getch();
						}
					}while(opc_most!='1' && opc_most!='2');
															
				break;
				
				case '2': 												//Promedio por grupos
					system("cls");
					if(check==0){
						l=1;												//Variable que inicia el grupo
						for(k=0;k<no_gp;k++,l++){							//Aumenta el grupo
							conta_sep=0;									//Contador por referencia
							separar_gpo(raiz,conta_sep,l,prom_gp);			//Se separa el grupo mandandole la raiz,el contador,el grupo y la posicion del grupo del arreglo de promedios
							for(conta=((l-1)*20)+1;conta<=l*20;conta++){	//el ciclo se repite hasta que se complete un rango de 20 personas
								prom_real[k]+=prom_gp[conta];				//La posicion del promedio la guardara segun el grupo que se este analizando					
							}	
						}
						tab_gp();											//Imprime la tabla de promedios
						for(k=0;k<no_gp;k++){
							SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),15);
							printf("\t|\t%c\t|\t%g\t|\n",65+k,prom_real[k]/20);		//Imprime el grupo y el promedio de dicho grupo
						}
						printf("\t");
						SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),13);
						for(k=0;k<33;k++){printf("%c",238);}					//Cierra tabla
						getch();
						check++;	
					}	
					else{
						tab_gp();											//Imprime la tabla de promedios
						for(k=0;k<no_gp;k++){
							SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),15);
							printf("\t|\t%c\t|\t%g\t|\n",65+k,prom_real[k]/20);		//Imprime el grupo y el promedio de dicho grupo
						}
						printf("\t");
						SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),13);
						for(k=0;k<33;k++){printf("%c",238);}					//Cierra tabla
						getch();
					}	
								
				break;
				case '3':	
					
					system("cls");
					conta_sep=0;										 //Se inicializa el contador
					gpo=selec_grupo(no_gp);								//Selecciona el grupo
					separar_gpo(raiz,conta_sep,gpo,prom_gp);					//se manda cual grupo selecciono junto con el puntero raiz y la posicion del arreglo de promedios
						for(conta=((gpo-1)*20)+1;conta<=gpo*20;conta++){		//Se hace el recorrido hasta que sean 20				
							for(conta_j=((gpo-1)*20)+1;conta_j<=gpo*20-1;conta_j++){	//Metodo burbuja para determinar el mayor y el menor
								if(prom_gp[conta_j]>prom_gp[conta_j+1]){
									temp = prom_gp[conta_j];
									prom_gp[conta_j] = prom_gp[conta_j+1];
									prom_gp[conta_j+1] = temp;
								}
							}
						}
			
						cal_alt_baj=prom_gp[gpo*20];		//Se le asigna el promedio mas alto a la ultima posicion del arreglo debido al metodo
						conta_sep=0;						//Se reinicia el contador
						obtener_nombre(raiz,conta_sep,gpo,prom_gp,cal_alt_baj);			//Se manda el valor del promedio para verificar que alumno(s) tienen ese promedio
					
					getch();
							
				break;
				case '4':
					
					system("cls");
					conta_sep=0;								//Este proceso es el mismo que para el mas alto
					gpo=selec_grupo(no_gp);
					separar_gpo(raiz,conta_sep,gpo,prom_gp);
						for(conta=((gpo-1)*20)+1;conta<=gpo*20;conta++){						
							for(conta_j=((gpo-1)*20)+1;conta_j<=gpo*20-1;conta_j++){
								if(prom_gp[conta_j]>prom_gp[conta_j+1]){
									temp = prom_gp[conta_j];
									prom_gp[conta_j] = prom_gp[conta_j+1];
									prom_gp[conta_j+1] = temp;
								}
							}
						}
						
						cal_alt_baj=prom_gp[((gpo-1)*20)+1];				//Se recoje la primera posicion ya que tendra el promedio mas bajo
						conta_sep=0;
						obtener_nombre(raiz,conta_sep,gpo,prom_gp,cal_alt_baj);			//Se buscara el alumno con ese promedio
					
					getch();							

				break;				
			}
	}while(opc!='5');						//Mientras la opcion sea diferente de 5 el ciclo se seguira repitiendo
	
	printf("\nFin del programa");
	
	getch();
	
}

void leer_portada(){							//Funcion para leer el archivo de la portada
	
	FILE *arch,*fich;
	char car;
	int a,tam_cad,i,j=0;
	
	do{
	system("cls");
		
	arch=fopen("upslp.txt","r");				//Abre archivos a usar
	fich=fopen("port-1.txt","r");						
	
	if(arch!=NULL){								//Si el archivo no esta vacio
		j=0;
		while(!feof(arch)){		
			gotoxy(10,j+3);							//Posicion donde comenzara el archivo
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
			gotoxy(47,j+3);
			for(i=0;i<37;i++){//margen
				fscanf(fich,"%d",&a);
				SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),a);
				putchar(219);
			}
			j++;
		}
		SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),63);
	     gotoxy(50,8);
	     printf("Alumno:Israel Arellano Godinez.");
	     gotoxy(50,9);
	     printf("(150389)");
	     gotoxy(50,11);
	     printf("Programacion II.");
	     gotoxy(50,13);
	     printf("Semestre Oto%co/Inverno 2016.",164);
	     gotoxy(50,15);
	     printf("Docente:Araceli Gabriela");
	     gotoxy(50,16);
	     printf("Aguilar Rodriguez");
		fclose(arch);
		}	
		SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),15);
		gotoxy(34,25);
		printf("PRESIONE ENTER PARA CONTINUAR");
		car=(char)getch();
																			
	}while(car!=13); //mientras no sea la tecla enter repetira el ciclo										
	
}

void bienvenida(){
	
	FILE *arch;													//Definicion para llamar archivos
	char car;
		system("cls");
		arch=fopen("bienvenida.txt","r");				//Abre archivo de bienvenida 
		
		SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),9);
		if(arch!=NULL){
			while(!feof(arch)){
				car=getc(arch);														//Imprime caracter por caracter
				putchar(car);	
			}
			fclose(arch);
		}												

}

char menu(){
	
	int tam_cad;				
	char op,opcion[100];
	do{
		system("cls");
		SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),158);
		gotoxy(55,2);
		printf("Menu");
		SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),15);
		printf("\n\n\n\t\t\t1.-Mostrar en pantalla.\n\n\t\t\t2.-Generar promedio por grupo.\n\n\t\t\t3.-Consultar por grupo al alumno con la calificacion mas alta.\n\n\t\t\t4.-Consultar por grupo al alumno con la calificacion mas baja.\n\n\t\t\t5.-Salir.");
		SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),158);
		printf("\n\n\n\t\tOPCION->");																											//Menu
		SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),10);
		fflush(stdin);
		scanf("%[^\n]",opcion);					//Se lee la cadena para seleccionar la opcion
		tam_cad=strlen(opcion);					//se obtiene el tamaño de la cadena
		
		op=opcion[0];							//Se le asgina a la variable op el valor de la cadena en la posicion 1
												
	}while(tam_cad!=1);					//Se repite el ciclo hasta que el tamaño de la cadena sea igual a 1
	
	return op;
	
}

int leer_desde_ar(){
	
	struct arbol *nuevo,*aux;					//punteros donde se direccionaran los datos leidos
	int al;										//numero de alumnos
	FILE *lista;
	
	al=0;
	lista=fopen("grupos.txt","r");				//Se abre el archivo alumnos solo para lectura
	while(!feof(lista)){						//Hasta recorrer todo el archivo 
		al++;									//Incrementa el numero de alumnos
		nuevo=(struct arbol*)malloc(sizeof (struct arbol));				//Se lee un nuevo elemento para asignarle memoria
		
		fscanf(lista,"%d %[^\t] %f",&nuevo->matricula,&nuevo->no_al,&nuevo->calif);			//Se lee el archivo y se almacena en el arbol
		
		nuevo->derecha=NULL;				//Se posiciona el puntero nuevo hacia izquierda y derecha como nulos
		nuevo->izquierda=NULL;
		
		if(raiz==NULL){						//Si no contiene nada el dato nuevo va a ser el principal
			raiz=nuevo;		
		}
		else{							
					
			aux=raiz;					//Si no se utilizara un auxiliar para recorrer el arbol
		
			while(aux!=NULL){			//Mientras que auxiliar no sea nulo
				
				if(nuevo->matricula>aux->matricula){	//Y si el nuevo dato es mayor al del auxiliar que esta igualado al de la raiz
				
					if(aux->derecha==NULL){				
						aux->derecha=nuevo;				//Verificara cual es nulo,si es derecha se guardara en ese puntero y se rompe el ciclo ya que se guardo
						break;
					}
					else{
						aux=aux->derecha;				//Si no lo guardara en el izquierdo
					}
					
				}
				else{									//Y si el el nuevo no es mayor al del auxiliar
					
					if(aux->izquierda==NULL){			//Se inserta primero en izquierda y se rompe el ciclo
						aux->izquierda=nuevo;
						break;
					}
					else{
						aux=aux->izquierda;				//Y si eso no se cumple lo deja en izquierda
					}	
						
				}	
			}	 
		}
	}
	
	fclose(lista);		//Se cierra el archivo
	
	return al;			//Retorna el numero de alumnos
					
}

void inorden(struct arbol *aux,int &i,int gpo){					//Ordenacion
	
	if (aux!=NULL) { 											//Si el auxiliar que apunta a raiz no es nulo
		inorden(aux->izquierda,i,gpo);							//Se utiliza la misma funcion con el puntero de izquierda
		i++;
		if(i<=(gpo*20) && i>((gpo-1)*20)){						//Se define el rango de todo el arbol a elegir,multiplicando el grupo por 20 para el final
			SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),13); //y restandole 1 por 20 para el dato principal
			printf("\n\t|");										//Se imprime un salto de linea para el formato de tabla
			SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),15);
			printf("\t%.3d   |\t%s\t|	  %g", aux->matricula,aux->no_al,aux->calif);			//Datos del alumno
			SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),13);
			printf("\t     |");									//Formato de tabla
		}
		inorden(aux->derecha,i,gpo);							//Se utiliza la recursividad ahora con el puntero derecha
	}

}

int selec_grupo(int ngp){					//Seleccion de grupo
		
	int i,gpo_;
	char gpo[100];							//variables a utilizar
	
	do{
	
	SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),158);
	printf("\n\n\n\t\t\tSelecciona un grupo:");
	SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),15);
		for(i=0;i<ngp;i++){
			printf("\n\n\t\t\t%d.-%c",i+1,65+i);		//Con el parametro del numero de grupos se muestra cuantos grupos existen
		}
	SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),158);
	printf("\n\n\t\t\tOPCION->");
	fflush(stdin);
	SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),10);
	gets(gpo);															//Se guarda la opcion elegida en un arreglo
	}while(valida(gpo,ngp)==1);											//Se hace la validacion
	
	gpo_=atoi(gpo);												//Si pasa de la validacion se convierte a entero y lo retorna
	
	return gpo_;
	
}

int valida(char valida[100],int ngp){															//Validacion de grupo
	
	int tam_cad,resul=0,i,op;										//Se declaran variables a usar, resul retorna la validacion
	
	tam_cad=strlen(valida);										//se recoje el tamaño de la cadena pasada por referencia
	
	for(i=0;i<tam_cad;i++){
		if(isdigit(valida[i])==0){								//Se revisa caracter por caracter verificando que sean dijitos
			system("cls");
			SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),12);
			printf("\n\n<-ERROR DATO NO VALIDO->");				//Mensaje de error
			fflush(stdin);										//Se limpia el buffer
			resul=1;											//Y el contador se iguala a 1
			getch();											
			break;												//Se rompe el ciclo				
		}
	}
	
	if(resul==0){									
	op=atoi(valida);
		if(op<=0 || op>ngp){										//Si es un dato invalido
			system("cls");
			SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),12);
			printf("\n\n<-ERROR DATO NO VALIDO->");				//mensaje de error
			fflush(stdin);										//Se limpia el buffer
			resul=1;											//Y el contador se iguala a 1 
			getch();
		}
	}
	
	return resul;												//Regresa el valor de la validacion
	
}

void separar_gpo(struct arbol *aux,int &i,int gpo,float sep_gp[]){				//Funcion que separa grupos
					
	if(aux!=NULL){														//Si el puntero auxiliar que apunta a raiz es diferente de nulo
		separar_gpo(aux->izquierda,i,gpo,sep_gp);						//Se hace la separacion de datos en modo inorden con derecha
		i++;
		if(i<=(gpo*20) && i>((gpo-1)*20)){								//Se define el rango de los datos por grupo
				sep_gp[i]=aux->calif;									//Se guarda el dato de la calificacion que es el que se guarda en el arreglo principal
		}																// de promedios
		separar_gpo(aux->derecha,i,gpo,sep_gp);							//Separacion con puntero a izquierda
	}
	
}

void obtener_nombre(struct arbol *aux,int &i,int gpo,float sep_gp[],float cal){					//Funcion que muestra el nombre del alumno ya sea 
																							//con la calificacion mas baja o mas alta
	if(aux!=NULL){	
		obtener_nombre(aux->izquierda,i,gpo,sep_gp,cal);								//Se hace el recorrido de todo el arbol con la misma funcion
		i++;
		if(i<=(gpo*20) && i>((gpo-1)*20)){												//Segun el grupo elegido se buscara el promedio mandado por referencia
			if(aux->calif==cal){
				printf("\n\nMatricula:%d\tNombre:%s\tCalifiacion:%g",aux->matricula,aux->no_al,aux->calif);								//Si lo encuentra lo imprime
			}
		}
		obtener_nombre(aux->derecha,i,gpo,sep_gp,cal);
	}
	
}

void imprime_arbol(struct arbol *aux,int i,int j,int &sep,int gpo){								//impresion del arbol
	
	if (aux!=NULL){ 
		sep++;
		if(sep<=(gpo*20) && sep>((gpo-1)*20)){													//segun el grupo elegido se manda la cual sera la raiz
		gotoxy(i,j);
		SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),10);
		printf("%.3d", aux->matricula);															//Se imprime la matricula
			if(aux->izquierda!=NULL){
				SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),11);					//formato para las flechas del arbol
				gotoxy(i-1,j+1);																//Hacia izquierda
				printf("/");
				gotoxy(i-3,j+2);
				printf("/");
			}
			if(aux->derecha!=NULL){
				SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),11);				//Hacia derecha
				gotoxy(i+2,j+1);
				printf("%c",92);
				gotoxy(i+4,j+2);
				printf("%c",92);
			}
		}
			
		imprime_arbol(aux->izquierda,i-5,j+3,sep,gpo);						//Metodo postorden
		imprime_arbol(aux->derecha,i+5,j+3,sep,gpo);
	
	}
	 
}

void tab1(){
	
	system("cls");											//Funcion que posiciona la primera tabla al inicio
	
	SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),15);
		gotoxy(48,0);
		printf("|");
		gotoxy(22,0);
		printf("|");
	SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),13);
		gotoxy(8,0);
	    printf("|");
	    gotoxy(69,0);
	    printf("|");
	SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),207);
		gotoxy(11,0);
	    printf("Matricula");
	    gotoxy(32,0);
	    printf("Nombre");
	    gotoxy(53,0);
	    printf("Calificacion");
		
}

void tab_gp(){
	
	SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),13);		//Funcion para la posicion de la tabla de promedios por grupo
		gotoxy(40,0);
		printf("|");
		gotoxy(24,0);
		printf("|");
		gotoxy(8,0);
	    printf("|");
	SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),10);
		gotoxy(11,0);
	    printf("   Grupo");
	    gotoxy(26,0);
	    printf("Calificacion\n");
		
}


void gotoxy(int posx, int posy){	// Funcion para manipular posicion de datos en pantalla
     
	 HANDLE hConsoleOutput;
     COORD coord;
     hConsoleOutput = GetStdHandle (STD_OUTPUT_HANDLE);
     coord.X = posx; 
     coord.Y = posy;
     SetConsoleCursorPosition (hConsoleOutput, coord);
     
}


