import os
from rembg import remove
from PIL import Image

def process_images(dir_path):
    print("Starting background removal process...")
    for filename in os.listdir(dir_path):
        if filename.endswith(".png"):
            input_path = os.path.join(dir_path, filename)
            # Create a backup just in case
            backup_path = os.path.join(dir_path, f"backup_{filename}")
            
            try:
                # Only process if it's not a backup
                if not filename.startswith("backup_"):
                    # Check if backup exists, if not create one
                    if not os.path.exists(backup_path):
                        img = Image.open(input_path)
                        img.save(backup_path)
                        
                    # Remove background
                    print(f"Processing {filename}...")
                    with open(backup_path, 'rb') as i:
                        with open(input_path, 'wb') as o:
                            input_data = i.read()
                            output_data = remove(input_data)
                            o.write(output_data)
                    print(f"Successfully processed {filename}")
            except Exception as e:
                print(f"Error processing {filename}: {str(e)}")

if __name__ == "__main__":
    process_images("h:/bionova site/produits")
