import json
import numpy as np
import matplotlib.pyplot as plt
from numpy.linalg import svd, matrix_rank


with open("matriz.json", "r") as f:
    data = json.load(f)

A = np.array(data, dtype=np.float64)


U, S, Vt = svd(A)
rank = matrix_rank(A)


colA = U[:, :rank]       # Espaço coluna (em ℝ^m)
linA = Vt[:rank, :]      # Espaço linha (em ℝ^n)
nulA = Vt[rank:, :]      # Núcleo de A
nulAt = U[:, rank:]      # Núcleo da transposta

# === 4. Função para projetar e desenhar vetores 2D ===
def plot_vectors(ax, vectors, title, color):
    origin = np.zeros(2)
    for v in vectors:
        v = v[:2]  # reduz para 2D
        ax.quiver(origin[0], origin[1], v[0], v[1],
                  angles='xy', scale_units='xy', scale=1, color=color)
    ax.set_xlim([-2, 2])
    ax.set_ylim([-2, 2])
    ax.set_aspect('equal')
    ax.set_title(title)
    ax.grid(True)

# === 5. Criar gráfico 2x2 ===
fig, axs = plt.subplots(2, 2, figsize=(10, 10))

plot_vectors(axs[0, 0], colA.T, "Espaço Coluna (colA)", "blue")
plot_vectors(axs[0, 1], linA, "Espaço Linha (linA)", "green")
plot_vectors(axs[1, 0], nulA, "Núcleo (N(A))", "red")
plot_vectors(axs[1, 1], nulAt.T, "Núcleo da Transposta (N(Aᵗ))", "orange")

# === 6. Salvar imagem ===
plt.tight_layout()
plt.savefig("subespacos.png", dpi=300)
print("Imagem salva como subespacos.png")
