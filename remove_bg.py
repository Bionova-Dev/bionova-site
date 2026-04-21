import os
from PIL import Image

def remove_white_background(img_path):
    img = Image.open(img_path).convert("RGBA")
    datas = img.getdata()
    
    # We will do a simple flood fill from corners.
    # Actually, a simpler approach if the label doesn't have pure white touching the edge:
    width, height = img.size
    
    # Let's use ImageDraw to floodfill the alpha channel
    # Better: use ImageOps or just simple tolerance
    from PIL import ImageDraw
    
    # Create a mask for flood fill
    # Pillow doesn't have an easy floodfill for alpha, but we can floodfill a color on a copy
    # and use it as a mask.
    
    # Create a solid black image, paste the original
    # We want to find all white pixels connected to the borders
    # Let's write a simple BFS
    
    pixels = img.load()
    visited = set()
    queue = []
    
    # Add borders to queue
    for x in range(width):
        queue.append((x, 0))
        queue.append((x, height - 1))
    for y in range(height):
        queue.append((0, y))
        queue.append((width - 1, y))
        
    def is_white_ish(r, g, b):
        return r > 240 and g > 240 and b > 240
        
    while queue:
        x, y = queue.pop(0)
        if (x, y) in visited:
            continue
        visited.add((x, y))
        
        if x < 0 or x >= width or y < 0 or y >= height:
            continue
            
        r, g, b, a = pixels[x, y]
        if is_white_ish(r, g, b):
            pixels[x, y] = (255, 255, 255, 0) # Make transparent
            # Add neighbors
            queue.append((x+1, y))
            queue.append((x-1, y))
            queue.append((x, y+1))
            queue.append((x, y-1))

    img.save(img_path)
    print(f"Processed {img_path}")

dir_path = "h:/bionova site/produits"
for filename in os.listdir(dir_path):
    if filename.endswith(".png"):
        try:
            remove_white_background(os.path.join(dir_path, filename))
        except Exception as e:
            print(f"Failed {filename}: {e}")
