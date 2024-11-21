import pygame
import random

# Inicializar Pygame
pygame.init()

# Configuración de la pantalla
ANCHO = 800
ALTO = 600
pantalla = pygame.display.set_mode((ANCHO, ALTO))
pygame.display.set_caption('Juego de la Serpiente')

# Colores
NEGRO = (0, 0, 0)
VERDE = (0, 255, 0)
ROJO = (255, 0, 0)
BLANCO = (255, 255, 255)

# Configuración de la serpiente y comida
TAMAÑO_BLOQUE = 20
VELOCIDAD = 15

class Serpiente:
    def __init__(self):
        self.longitud = 1
        self.posiciones = [((ANCHO // 2), (ALTO // 2))]
        self.direccion = random.choice([pygame.K_UP, pygame.K_DOWN, pygame.K_LEFT, pygame.K_RIGHT])
        self.color = VERDE
        self.puntuacion = 0

    def obtener_cabeza(self):
        return self.posiciones[0]

    def girar(self, punto):
        if self.longitud > 1 and (punto[0] * -1, punto[1] * -1) == self.direccion:
            return
        else:
            self.direccion = punto

    def moverse(self):
        cur = self.obtener_cabeza()
        x, y = self.direccion
        nuevo = ((cur[0] + (x*TAMAÑO_BLOQUE)), (cur[1] + (y*TAMAÑO_BLOQUE)))

        if nuevo in self.posiciones[2:]:
            self.reiniciar()
        else:
            self.posiciones.insert(0, nuevo)
            if len(self.posiciones) > self.longitud:
                self.posiciones.pop()

    def reiniciar(self):
        self.longitud = 1
        self.posiciones = [((ANCHO // 2), (ALTO // 2))]
        self.direccion = random.choice([pygame.K_UP, pygame.K_DOWN, pygame.K_LEFT, pygame.K_RIGHT])
        self.puntuacion = 0

    def dibujar(self, superficie):
        for p in self.posiciones:
            pygame.draw.rect(superficie, self.color, (p[0], p[1], TAMAÑO_BLOQUE, TAMAÑO_BLOQUE))

    def manejar_teclas(self):
        for evento in pygame.event.get():
            if evento.type == pygame.QUIT:
                return False
            elif evento.type == pygame.KEYDOWN:
                if evento.key == pygame.K_UP:
                    self.girar((0, -1))
                elif evento.key == pygame.K_DOWN:
                    self.girar((0, 1))
                elif evento.key == pygame.K_LEFT:
                    self.girar((-1, 0))
                elif evento.key == pygame.K_RIGHT:
                    self.girar((1, 0))
        return True

class Comida:
    def __init__(self):
        self.posicion = (0, 0)
        self.color = ROJO
        self.regenerar()

    def regenerar(self):
        self.posicion = (random.randint(0, (ANCHO-TAMAÑO_BLOQUE) // TAMAÑO_BLOQUE) * TAMAÑO_BLOQUE,
                         random.randint(0, (ALTO-TAMAÑO_BLOQUE) // TAMAÑO_BLOQUE) * TAMAÑO_BLOQUE)

    def dibujar(self, superficie):
        pygame.draw.rect(superficie, self.color, 
                         (self.posicion[0], self.posicion[1], TAMAÑO_BLOQUE, TAMAÑO_BLOQUE))

def main():
    # Inicializar reloj
    reloj = pygame.time.Clock()
    
    # Crear serpiente y comida
    serpiente = Serpiente()
    comida = Comida()

    # Fuente para puntuación
    fuente = pygame.font.Font(None, 36)

    # Bucle principal del juego
    corriendo = True
    while corriendo:
        # Manejar eventos
        corriendo = serpiente.manejar_teclas()

        # Moverse
        serpiente.moverse()

        # Comprobar colisión con comida
        if serpiente.obtener_cabeza() == comida.posicion:
            serpiente.longitud += 1
            serpiente.puntuacion += 1
            comida.regenerar()

        # Comprobar colisiones con bordes
        if (serpiente.obtener_cabeza()[0] < 0 or 
            serpiente.obtener_cabeza()[0] >= ANCHO or 
            serpiente.obtener_cabeza()[1] < 0 or 
            serpiente.obtener_cabeza()[1] >= ALTO):
            serpiente.reiniciar()

        # Dibujar
        pantalla.fill(NEGRO)
        serpiente.dibujar(pantalla)
        comida.dibujar(pantalla)

        # Mostrar puntuación
        texto_puntuacion = fuente.render(f'Puntuación: {serpiente.puntuacion}', True, BLANCO)
        pantalla.blit(texto_puntuacion, (10, 10))

        # Actualizar pantalla
        pygame.display.update()

        # Control de velocidad
        reloj.tick(VELOCIDAD)

    # Salir de Pygame
    pygame.quit()

# Ejecutar el juego
if __name__ == "__main__":
    main()